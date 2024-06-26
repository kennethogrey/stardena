<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Livewire\Home\SessionComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserComponent extends Component
{
    use SessionComponent;
    public $user_id, $updateUser, $deleteUser, $name, $email, $phone, $staff, $user,
     $status, $role, $data, $validationErrors, $form_create_user, $form_update_user;

    public function mount()
    {
        //
    }

    #[\Livewire\Attributes\On('editUser')]
    public function editUser($userId): void
    {
        $this->user_id = $userId;
        $this->updateUser = User::find($this->user_id);
        if (!auth()->user()->staff == 'admin' || !auth()->user()->role == 'admin') {
            session()->flash('warning', 'You Have No Permissions');
        } else {
            $this->name = $this->updateUser->name;
            $this->email = $this->updateUser->email;
            $this->phone = $this->updateUser->phone;
            $this->role = $this->updateUser->role;
            $this->staff = $this->updateUser->staff;
            $this->status = $this->updateUser->status;
            $this->form_update_user = 'update_user';
    
            $this->js('openModal()');
        }
    }


    public function update_user(): void
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'staff' => $this->staff,
            'status' => $this->status,
            'password' => '1234567890',
        ];

        $validatedData = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'phone' => 'required|string|min:10|regex:/^[0-9]+$/',
            'role' => 'nullable|string|max:25|in:admin,developer,staff,client',
            'staff' => 'nullable|string|max:25|in:admin,client',
            'status' => 'nullable|integer|max:25|in:1,0',
        ]);
        
        if($validatedData->fails()){
            $this->validationErrors = $validatedData->errors()->toArray();
            if ($this->form_create_user == 'create_user'){
                $this->js('openCreateUserModal()');
            } elseif ($this->form_update_user == 'update_user') {
                $this->js('openModal()');
            } else {
                session()->flash('warning', 'No Form Specified');
                $this->js('closeModal()');
            }
            // $this->js('validationErrors('.$validatedData->errors().')');
        } else {
        
            try {
                if ($this->form_create_user == 'create_user') {
                    $data['password'] = Hash::make($data['password']);
                    $user_created = event(new Registered($user = User::create($data)));
                    if ($user_created) {
                        session()->flash('success', 'User Created Successfully');
                    }else {
                        session()->flash('danger', 'An Error Occured');
                    }
                }elseif ($this->form_update_user == 'update_user') {
                    $user = User::find($this->user_id);
                    if ($user) {
                        $user->update([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'phone' => $data['phone'],
                            'role' => $data['role'],
                            'staff' => $data['staff'],
                            'status' => $data['status'],
                        ]);
                        session()->flash('success', 'Updated Successfully');
                    }else {
                        session()->flash('danger', 'Update Failed');
                    } 
                } else {
                    session()->flash('warning', 'No Form Specified');
                }
            } catch (\Exception $e) {
                session()->flash('danger', 'An Error.'.$e->getMessage());
            }
            $this->js('closeModal()');
            $this->reset();
        }
        $this->js('validationErrors('.$validatedData->errors().')');
    }

    public function openCreateUserModal():void 
    {
        $this->form_create_user = 'create_user';
        $this->js('openCreateUserModal()');
    }

    #[\Livewire\Attributes\On('deleteUser')]
    public function deleteUser($userId): void
    {
        $this->user_id = $userId;
        if (!auth()->user()->role == 'admin' || !auth()->user()->staff == 'admin') {
            session()->flash('warning', 'You Have No Permissions');
        } else {
            $this->user = User::find($this->user_id);
            if ($this->user->role == 'admin' || $this->user->staff == 'admin') {
                session()->flash('warning', 'User Can Not Be Deleted');
            } else {
                if(!$this->user){
                    session()->flash('warning', 'User Not Available');
                }else {
                    $this->js('confirmDeleteUser()');
                }
            }
        }
    }

    public function deleteUserNow($user_id): void
    {
        $user = User::find($user_id);
        if ($user) {
            \Storage::delete('public/profile-photos/' . $user->profile_photo);
            $user->delete();
            session()->flash('success', 'User Deleted Successfully');
            $this->js('closeModal()');
        } else {
            session()->flash('danger', 'Something Went Wrong');
        }
    }


    public function render()
    {
        return view('livewire.users.user-component', [
            
        ]);
    }
}
