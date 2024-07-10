<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            session()->flash('danger', __($status));
            $this->addError('email', __($status));

            return;
        }
        session()->flash('success', __($status));
        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }

    public function removeAlert()
    {
        session()->forget('success');
    }
}; ?>

<div>
    <div class="row mb-4">
        <div class="col-xl-7 col-xxl-4">
            <p>
                @include('livewire.home.session-component')
            </p>
        </div>
    </div> 
    <div class="card-group d-block d-md-flex row">
        <div class="card col-md-7 p-4 mb-0">
            <div class="card-body">
                <p class="text-body-secondary">{{__('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')}}</p>
                @if ($errors->any())
                    <div class="text-danger">
                        <ul class="mb-0" style="font-size: 0.875rem;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form wire:submit="resetPassword">
                    <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-user')}}"></use>
                        </svg></span>
                        <input wire:model="email" id="email" name="email" class="form-control" type="email" placeholder="Email"/>
                    </div>
                    <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-user')}}"></use>
                        </svg></span>
                        <input wire:model="password" id="password" name="password" class="form-control" type="password" placeholder="Password"/>
                    </div>
                    <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-user')}}"></use>
                        </svg></span>
                        <input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" class="form-control" type="password" placeholder="Repeat Password"/>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-ghost-primary px-4">{{ __('Reset Password') }}</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div> 
    {{--
    <form wire:submit="resetPassword">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
    --}}
</div>
