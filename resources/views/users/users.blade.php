<x-app-layout>
    @section('title', 'Dashboard - Stardena')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                @if (auth()->user()->role !== 'developer' && auth()->user()->role !== 'client')
                    <livewire:users.user-component/>
                @else
                    @include('users.not-found')
                @endif
            </div>
        </div>
    @endsection
</x-app-layout>
