<x-app-layout>
    <x-slot name="header">
        <h4>  
            <div id="notification" class="fixed top-0 right-0 mb-4 mr-4 p-4 bg-gray-800 text-white rounded shadow-md opacity-0 transition-opacity duration-500 hidden">
                <span id="notificationMessage"></span>
            </div>
        </h4>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:user-table/>
                    @include('dashboard.edit-user-role')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('action-status.session')
