<x-app-layout>
    @section('title', 'Newsletters - Stardena')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4"> 
                <div class="row">
                    <div class="col">
                        <div class="card mb-4">
                            @if (auth()->user()->role !== 'developer' && auth()->user()->role !== 'client')
                                <div class="card-header">
                                    <strong>{{__('Newsletters')}}</strong>
                                </div>
                                <livewire:home.newsletter /> 
                                <livewire:home.email-table/>
                            @else
                                @include('users.not-found')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
