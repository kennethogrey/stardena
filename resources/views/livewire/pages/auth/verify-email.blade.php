<?php

use App\Livewire\Actions\Logout;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();
        
        session()->flash('success', 'verification-link-sent');
        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();
        $this->js('logoutRefresh()');
    }
}; ?>

<div>
    <div class="card-group d-block d-md-flex row">
        <div class="card col-md-7 p-4 mb-0">
            <div class="card-body">
                <p class="text-body-secondary">{{__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')}}</p>
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
                <div class="row">
                    <div class="col-6">
                        <button wire:click="sendVerification" class="btn btn-ghost-primary px-4">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </div>
                    <div class="col-6">
                        <button wire:click="logout" type="submit" class="btn btn-ghost-danger px-4">
                            {{ __('Log Out') }}
                        </button>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <script>
        function logoutRefresh() {
            // window.location.reload();
            window.location.href = '/';
        }
    </script>

{{--

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <x-primary-button wire:click="sendVerification">
            {{ __('Resend Verification Email') }}
        </x-primary-button>

        <button wire:click="logout" type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __('Log Out') }}
        </button>
    </div>
    --}}

</div>
