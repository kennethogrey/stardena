<x-app-layout>
    @section('title', 'Dashboard - PharmacyMS')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <livewire:users.user-component/>
            </div>
        </div>
    @endsection
</x-app-layout>
