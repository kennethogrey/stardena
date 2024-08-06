<x-app-layout>
    @section('title', 'Systems - Stardena')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
            <div class="row">
                <div class="col-12">
                    <livewire:software.system-component/>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>