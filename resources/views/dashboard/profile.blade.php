<x-app-layout>
    @section('title', 'Profile - Stardena')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <div class="row">
                    <div class="col-12">    
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header"><strong> {{ __('Your Profile Information') }}</strong></div>
                                        <livewire:profile.update-profile-information-form />
                                        <livewire:profile.update-password-form />
                                        {{-- <livewire:profile.delete-user-form /> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
