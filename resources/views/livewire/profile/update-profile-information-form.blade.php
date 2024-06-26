<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    
    use WithFileUploads;
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public $photo;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:14', 'min:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    public function updateProfilePhoto(): void
    {
        $this->validate([
            'photo' => 'required|file|mimes:png,jpeg,jpg|max:5120',
        ]);

        $image_extension = $this->photo->getClientOriginalExtension();
        $image_name = 'profile_' . time() . '.' . $image_extension;
        $this->photo->storeAs('public/profile-photos', $image_name);
        
        $user = Auth::user();
        if ($user) {
            // delete previous Image
            \Storage::delete('public/profile-photos/' . $user->profile_photo);
            $user->profile_photo = $image_name;
            $user->save();
            $this->dispatch('photo-updated', ['name' => $user->name]);   
        }
    }

}; ?>
<section>
    <div class="row mb-4 align-items-stretch">
        <div class="col-xl-5 col-xxl-5 mb-4 mb-xl-0">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <h4 class="fw-bolder">{{__('Profile Photo')}}</h4>
                <p>{{__('Update your account\'s profile photo.')}}</p>
            </div>
        </div>
        <div class="col-xl-7 col-xxl-7">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <div class="text-center mb-3">
                    <img src="{{ getUserPhoto() }}" class="rounded" alt="favicon" width="auto" height="60">
                </div>
                <form wire:submit="updateProfilePhoto">
                    <div class="input-group mb-3">
                        <input wire:model="photo" class="form-control" id="inputGroupFile02" type="file">
                        <label class="input-group-text" for="inputGroupFile02">{{ __('Upload') }}</label>
                    </div>
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-ghost-primary">{{ __('Update Photo') }}</button>
                    </div>
                    <x-action-message class="text-success" on="photo-updated">
                        {{ __('Photo Updated') }}
                    </x-action-message>
                </form>
            </div>
        </div>
    </div>
    <div class="row mb-4 align-items-stretch">
        <div class="col-xl-5 col-xxl-5 mb-4 mb-xl-0">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <h4 class="fw-bolder">{{__('Profile Information')}}</h4>
                <p>{{__('Update your account\'s profile information and email address.')}}</p>
            </div>
        </div>
        <div class="col-xl-7 col-xxl-7">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <form wire:submit="updateProfileInformation">
                    <div class="form-floating mb-3">
                        <input wire:model="name" class="form-control rounded-md" id="name" name="name" type="text" placeholder="name">
                        <label for="floatingInput2">{{ __('Full Name') }}</label>
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                        <input wire:model="email" class="form-control rounded-md" id="email" name="email" type="email" placeholder="email">
                        <label for="floatingInput2">{{ __('Email') }}</label>
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                        <input wire:model="phone" class="form-control rounded-md" id="phone" name="phone" type="text" placeholder="phone">
                        <label for="floatingInput2">{{ __('Phone') }}</label>
                    </div>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-ghost-primary">{{ __('Update Info') }}</button>
                    </div>
                    <x-action-message class="text-success" on="profile-updated">
                    {{ __('Info Updated') }}
                    </x-action-message>
                </form>
            </div>
        </div>
    </div>
</section>
