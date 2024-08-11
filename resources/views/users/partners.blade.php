<x-app-layout>
    @section('title', 'Partners - Stardena')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                @if (auth()->user()->role === 'admin' && auth()->user()->role === 'developer')
                    <livewire:users.partner-component/>
                @else
                    @include('users.not-found')
                @endif
            </div>
        </div>
    @endsection
</x-app-layout>
