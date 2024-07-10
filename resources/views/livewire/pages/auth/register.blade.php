<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:14', 'min:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
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
    <div class="card mb-4 mx-4">
        <div class="card-body p-4">
            <h1>{{__('Sign Up')}}</h1>
            <p class="text-body-secondary">{{__('Create your account')}}</p>
            <form wire:submit="register">
                @if ($errors->any())
                    <div class="text-danger">
                        <ul class="mb-0" style="font-size: 0.875rem;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-user')}}"></use>
                    </svg></span>
                    <input wire:model="name" id="name" name="name" class="form-control" type="text" placeholder="Full Names">
                </div>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-envelope-open')}}"></use>
                    </svg></span>
                    <input wire:model="email" id="email" name="email" class="form-control" type="email" placeholder="Email">
                </div>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-phone')}}"></use>
                    </svg></span>
                    <input wire:model="phone" id="phone" name="phone" class="form-control" type="text" placeholder="Phone Number">
                </div>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-lock-locked')}}"></use>
                    </svg></span>
                    <input wire:model="password" id="password" name="password" class="form-control" type="password" placeholder="Password">
                </div>
                <div class="input-group mb-4"><span class="input-group-text">
                    <svg class="icon">
                    <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-lock-locked')}}"></use>
                    </svg></span>
                    <input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" class="form-control" type="password" placeholder="Repeat password">
                </div>
                <div class="row">
                        <div class="col-6">
                            <button class="btn btn-ghost-primary px-4" type="submit">Create Account</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-ghost-primary px-4" onclick="loginPage()">{{ __('Already registered?') }}</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <script>
        function loginPage() {
            window.location.href = '/login';
        }
    </script>
    {{--
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telephne Address -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    --}}
</div>
