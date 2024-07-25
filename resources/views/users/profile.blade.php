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
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <strong> {{ __('More Profile Information') }}</strong>
                                </div>
                                <livewire:users.profile-component />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>