<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $password = '';

    /**
     * Confirm the current user's password.
     */
    public function confirmPassword(): void
    {
        $this->validate([
            'password' => ['required', 'string'],
        ]);

        if (! Auth::guard('web')->validate([
            'email' => Auth::user()->email,
            'password' => $this->password,
        ])) {
            session()->flash('danger', 'An Error Occurred!!');
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
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
                <p class="text-body-secondary">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
                @if ($errors->any())
                    <div class="text-danger">
                        <ul class="mb-0" style="font-size: 0.875rem;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form wire:submit="confirmPassword">
                    <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-user')}}"></use>
                        </svg></span>
                        <input wire:model="password" id="password" name="password" class="form-control" type="password" placeholder="Password"/>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-ghost-primary px-4">{{ __('Confirm') }}</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div> 
    {{--
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form wire:submit="confirmPassword">
        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password"
                          id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
    --}}
</div>
