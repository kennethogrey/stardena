<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    public $title;
    public $location;
    public $dob;
    public $facebook;
    public $whatsapp;
    public $twitter;
    public $pinterest;
    public $linkedin;
    public $telegram;
    public $instagram;
    public $resume;
    public $user_id;

    public function mount(): void
    {
        $profile = Profile::find(Auth::user()->id);
        $this->title = $profile->title;
        $this->location = $profile->location;
        $this->dob = $profile->dob;
        $this->facebook = $profile->facebook;
        $this->whatsapp = $profile->whatsapp;
        $this->twitter = $profile->twitter;
        $this->pinterest = $profile->pinterest;
        $this->linkedin = $profile->linkedin;
        $this->telegram = $profile->telegram;
        $this->instagram = $profile->instagram;
        $this->resume = $profile->resume;
    }

    public function updatePersonalInformation(): void
    {
        $user = Auth::user();
        $user_id = $user->id;

        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'facebook' => ['nullable', 'string'],
            'whatsapp' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'pinterest' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'telegram' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
        ]);

        $validated['user_id'] = $user_id;

        $user_profile = Profile::updateOrInsert(
            ['user_id' => $user_id], 
            $validated
        );

        if ($user_profile) {
            session()->flash('success', 'Personal information updated successfully.');
            $this->dispatch('profile-updated', name: $user->name);
        } else {
            session()->flash('danger', 'Something went wrong.');
        }
    }

    public function removeAlert()
    {
        session()->forget('success');
    }

}; ?>
<section>
    <div class="row mb-4 align-items-stretch">
        <div class="col-xl-5 col-xxl-5 mb-4 mb-xl-0">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <h4 class="fw-bolder">{{__('Personal Information')}}</h4>
                <p>{{__('Update your personal profile information.')}}</p>
            </div>
        </div>
        <div class="col-xl-7 col-xxl-7">
            <div class="border p-4 rounded-3 d-flex flex-column h-100">
                <form wire:submit="updatePersonalInformation">
                    <div class="form-floating mb-3">
                        <input wire:model="title" class="form-control rounded-md" id="title" name="title" type="text" placeholder="title" value="{{ old('title') }}">
                        <label for="floatingInput2">{{ __('Professional Title') }}</label>
                    </div>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                        <input wire:model="location" class="form-control rounded-md" id="location" name="location" type="location" placeholder="Address" value="{{ old('location') }}">
                        <label for="floatingInput2">{{ __('Address/Location') }}</label>
                    </div>
                    @error('location')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                        <input wire:model="dob" class="form-control rounded-md" id="dob" name="dob" type="date" placeholder="Date Of Birth" value="{{ old('dob') }}">
                        <label for="floatingInput2">{{ __('Date Of Birth') }}</label>
                    </div>
                    @error('dob')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div>
                        <label for="floatingInput2">{{ __('Social Media Links') }}</label><br>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1"><svg width="24" height="24">
                            <use xlink:href="{{ asset('panel/icons/sprites/brand.svg#cib-facebook') }}"></use>
                        </svg></span>
                            <input class="form-control" type="text" wire:model="facebook" name="facebook" id="facebook"  placeholder="facebook" aria-label="facebook" aria-describedby="basic-addon1" value="{{ old('facebook') }}">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1"><svg width="24" height="24">
                            <use xlink:href="{{ asset('panel/icons/sprites/brand.svg#cib-whatsapp') }}"></use>
                        </svg></span>
                            <input class="form-control" type="text" wire:model="whatsapp" name="whatsapp" id="whatsapp" placeholder="whatsapp" aria-label="whatsapp" aria-describedby="basic-addon1" value="{{ old('whatsapp') }}">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1"><svg width="24" height="24">
                            <use xlink:href="{{ asset('panel/icons/sprites/brand.svg#cib-twitter') }}"></use>
                        </svg></span>
                            <input class="form-control" type="text" wire:model="twitter" name="twitter" id="twitter" placeholder="twitter/X" aria-label="twitter/X" aria-describedby="basic-addon1" value="{{ old('twitter') }}">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1"><svg width="24" height="24">
                            <use xlink:href="{{ asset('panel/icons/sprites/brand.svg#cib-pinterest-p') }}"></use>
                        </svg></span>
                            <input class="form-control" type="text" wire:model="pinterest" name="pinterest" id="pinterest" placeholder="pinterest" aria-label="pinterest" aria-describedby="basic-addon1" value="{{ old('pinterest') }}">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1"><svg width="24" height="24">
                            <use xlink:href="{{ asset('panel/icons/sprites/brand.svg#cib-linkedin') }}"></use>
                        </svg></span>
                            <input class="form-control" type="text" wire:model="linkedin" name="linkedin" id="linkedin"  placeholder="linkedin" aria-label="linkedin" aria-describedby="basic-addon1" value="{{ old('linkedin') }}">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1"><svg width="24" height="24">
                            <use xlink:href="{{ asset('panel/icons/sprites/brand.svg#cib-telegram-plane') }}"></use>
                        </svg></span>
                            <input class="form-control" type="text" wire:model="telegram" name="telegram" id="telegram" placeholder="telegram" aria-label="telegram" aria-describedby="basic-addon1" value="{{ old('telegram') }}">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1"><svg width="24" height="24">
                            <use xlink:href="{{ asset('panel/icons/sprites/brand.svg#cib-instagram') }}"></use>
                        </svg></span>
                            <input class="form-control" type="text" wire:model="instagram" name="instagram" id="instagram" placeholder="instagram" aria-label="instagram" aria-describedby="basic-addon1" value="{{ old('instagram') }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-ghost-primary">{{ __('Update Info') }}</button>
                    </div>
                    <x-action-message class="text-success" on="profile-updated">
                        {{ __('Personal Info Updated') }}
                    </x-action-message>
                </form>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-xl-7 col-xxl-4">
            <p>
                @include('livewire.home.session-component')
            </p>
        </div>
    </div> 
</section>
