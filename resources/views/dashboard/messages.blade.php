<x-app-layout>
    @section('title', 'Feedback - Stardena')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                @if (auth()->user()->role === 'admin')
                    <livewire:home.message-component/>
                @else
                    @include('users.not-found')
                @endif
            </div>
        </div>
    @endsection
</x-app-layout>