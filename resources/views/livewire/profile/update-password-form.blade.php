<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section>
    <div class="row mb-4 align-items-stretch">
        <div class="col-xl-5 col-xxl-5 mb-4 mb-xl-0">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <h4 class="fw-bolder">{{__('Update Password')}}</h4>
                <p>{{__('Ensure your account is using a long, random password to stay secure.')}}</p>
            </div>
        </div>
        <div class="col-xl-7 col-xxl-7">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <form wire:submit="updatePassword">
                    <div class="form-floating mb-3">
                        <input wire:model="current_password" id="update_password_current_password" name="current_password" type="password" class="form-control rounded-md" placeholder="current_password">
                        <label for="floatingInput2">{{ __('Current Password') }}</label>
                    </div>
                    @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input wire:model="password" id="update_password_password" name="password" type="password" class="form-control rounded-md" placeholder="password">
                        <label for="floatingInput2">{{ __('New Password') }}</label>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-floating mb-3">
                        <input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control rounded-md" placeholder="password">
                        <label for="floatingInput2">{{ __('Confirm New Password') }}</label>
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-md-6 mb-3">
                        <button class="btn btn-ghost-primary">{{ __('Update Password') }}</button>
                    </div>
                    <x-action-message class="text-success" on="password-updated">
                        {{ __('Password Updated') }}
                    </x-action-message>
                </form>
            </div>
        </div>
    </div>
</section>
