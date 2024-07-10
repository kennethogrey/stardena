<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            session()->flash('danger', __($status));
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');
        
        session()->flash('status', 'verification-link-sent');
        session()->flash('success', __($status));
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
                @if (session('status') == 'verification-link-sent')
                    <div class="text-success" style="font-size: 0.875rem;">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
                <form wire:submit="sendPasswordResetLink">
                    <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-user')}}"></use>
                        </svg></span>
                        <input wire:model="email" id="email" name="email" class="form-control" type="email" placeholder="Email"/>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-ghost-primary px-4">{{ __('Email Password Reset Link') }}</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-ghost-primary px-4" onclick="registerPage()">{{ __('Register Again') }}</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div>  
    <script>
        function registerPage() {
            window.location.href = '/register';
        }
    </script>
    {{--  
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
    --}}
</div>
