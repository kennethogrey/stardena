<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Livewire\Home\SessionComponent;
use Illuminate\Support\Facades\Validator;

class UserComponent extends Component
{
    use SessionComponent;
    public $user_id, $updateUser, $deleteUser, $name, $email, $phone, $staff, $status, $role, $data, $validationErrors;

    public function mount()
    {
        //
    }

    #[\Livewire\Attributes\On('editUser')]
    public function editUser($userId): void
    {
        $this->user_id = $userId;
        $this->updateUser = User::find($this->user_id);
        if ($this->updateUser->staff == 'admin' || $this->updateUser->role == 'admin') {
            session()->flash('danger', 'User Can Not Be Updated');
        } else {
            $this->name = $this->updateUser->name;
            $this->email = $this->updateUser->email;
            $this->phone = $this->updateUser->phone;
            $this->role = $this->updateUser->role;
            $this->staff = $this->updateUser->staff;
            $this->status = $this->updateUser->status;
    
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
            'status' => $this->status
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
            $this->js('openModal()');
            // $this->js('validationErrors('.$validatedData->errors().')');
        } else {
        
            $user = User::find($this->user_id);
            try {
                
                if (!$user->staff == 'admin' || !$user->role == 'admin') {
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
            } catch (\Exception $e) {
                session()->flash('danger', 'An Error.'.$e->getMessage());
            }
            $this->js('closeModal()');
            $this->reset();
        }
        $this->js('validationErrors('.$validatedData->errors().')');
    }
    public function render()
    {
        return view('livewire.users.user-component', [
            
        ]);
    }
}
