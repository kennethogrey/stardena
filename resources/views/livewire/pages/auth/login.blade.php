<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
    }

    public function removeAlert()
    {
        session()->forget('success');
    }
}; ?>

<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
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
                <p class="text-body-secondary">{{__('Sign Into Your Account')}}</p>
                <form wire:submit="login">
                    @if ($errors->any())
                        <div class="text-danger">
                            <ul class="mb-0" style="font-size: 0.875rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-user')}}"></use>
                        </svg></span>
                        <input wire:model="form.email" id="email" name="email" class="form-control" type="email" placeholder="Email"/>
                    </div>
                    <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-lock-locked')}}"></use>
                        </svg></span>
                        <input wire:model="form.password" id="password" name="password" class="form-control" type="password" placeholder="Password"/>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-ghost-primary px-4">{{__('Login')}}</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-ghost-primary px-4" onclick="forgotPasswordPage()">{{__('Forgot Password?')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card col-md-5 text-white bg-primary py-5">
            <div class="card-body text-center">
                <div>
                    <h2>{{__('Sign up')}}</h2>
                    <p>{{__('Sign up to view reports and buy license keys for customers. Get quotes for eCommerce purchases and access other exclusive services.')}}</p>
                    <button class="btn btn-lg btn-outline-light mt-3" onclick="registerPage()">{{ __('Register Again') }}</button>                
                </div>
            </div>
        </div>
    </div>
    <script>
        function registerPage() {
            window.location.href = '/register';
        }
        function forgotPasswordPage() {
            var href="{{ route('password.request') }}"
            window.location.href = href;
        }
    </script>
</div>
