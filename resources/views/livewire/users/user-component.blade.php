<div>
    {{-- In work, do what you enjoy. --}}
    <div class="row">
        <div class="col-12">
            <div class="row mb-4">
                <div class="col-xl-7 col-xxl-4">
                    <p>
                        @include('livewire.home.session-component')
                    </p>
                </div>
            </div>      
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong>{{__('Users Table')}}</strong>
                            <button class="btn btn-ghost-primary" wire:click="openCreateUserModal">{{ __('Add User') }}</button>
                        </div>
                        <div class="card-body">
                            <livewire:users.user-table/>
                            @if ($updateUser)
                                <div class="example">
                                    <div class="tab-content rounded-bottom">
                                        <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1002">
                                            <div class="modal fade" id="staticBackdropLive" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLiveLabel">{{__('Edit')}} @if ($updateUser) {{ $updateUser->name }} @endif Infomation</h5>
                                                            <button class="btn-close" type="button" onclick="closeModal()" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form wire:submit.prevent="update_user" id="myForm" class="mt-4">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                    <input wire:model.lazy="form_update_user" class="form-control rounded-md" type="hidden">
                                                                        <div class="d-flex align-items-center mb-3">
                                                                            <div class="form-floating flex-grow-1">
                                                                                <input wire:model="name" name="name" class="form-control rounded-md" id="floatingInput2" type="text" placeholder="name">
                                                                                <label for="floatingInput2">{{ __('Name') }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-danger">
                                                                            @if(isset($validationErrors['name']))
                                                                                @foreach($validationErrors['name'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <div class="d-flex align-items-center mb-3">
                                                                            <div class="form-floating flex-grow-1">
                                                                                <input wire:model="email" name="email" class="form-control rounded-md" id="floatingInput2" type="email" placeholder="{{ __('user.email') }}">
                                                                                <label for="floatingInput2">{{ __('Email') }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-danger">
                                                                            @if(isset($validationErrors['email']))
                                                                                @foreach($validationErrors['email'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <div class="d-flex align-items-center mb-3">
                                                                            <div class="form-floating flex-grow-1">
                                                                                <input wire:model="phone" name="phone" class="form-control rounded-md" id="floatingInput2" type="integer" placeholder="{{ __('user.phone_number') }}">
                                                                                <label for="floatingInput2">{{ __('Phone') }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-danger">
                                                                            @if(isset($validationErrors['phone']))
                                                                                @foreach($validationErrors['phone'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <select wire:model="staff" class="form-select  h-10 px-3 py-3 rounded-md text-sm font-medium" aria-label="Default select example">
                                                                                <option>{{ __('Select Staff') }}</option>
                                                                                <option value="client"> Client</option>
                                                                                <option value="admin"> Admin</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="text-danger d-block">
                                                                            @if(isset($validationErrors['staff']))
                                                                                @foreach($validationErrors['staff'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <select wire:model="role" class="form-select  h-10 px-3 py-3 rounded-md text-sm font-medium" aria-label="Default select example">
                                                                                <option>{{ __('Select Role') }}</option>
                                                                                <option value="client"> {{__('Client')}}</option>
                                                                                <option value="admin"> {{__('Admin')}}</option>
                                                                                <option value="developer"> {{__('Developer')}}</option>
                                                                                <option value="staff"> {{__('Employee')}}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="text-danger d-block">
                                                                            @if(isset($validationErrors['role']))
                                                                                @foreach($validationErrors['role'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <select wire:model="status" class="form-select  h-10 px-3 py-3 rounded-md text-sm font-medium" aria-label="Default select example">
                                                                                <option>{{ __('Select Status') }}</option>
                                                                                <option value="0">{{__('Inactive')}}</option>
                                                                                <option value="1">{{__('Active')}}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="text-danger">
                                                                            @if(isset($validationErrors['status']))
                                                                                @foreach($validationErrors['status'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-ghost-secondary" type="button" onclick="closeModal()">{{__('Close')}}</button>
                                                                    <button class="btn btn-ghost-primary">{{('Update')}}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button to trigger the modal -->
                                            <!-- <button id="showModalButton" class="btn btn-primary" type="button">Show Modal</button> -->
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($form_create_user))
                                <div class="example">
                                    <div class="tab-content rounded-bottom">
                                        <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1002">
                                            <div class="modal fade" id="staticCreateUser" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLiveLabel">{{__('Add New User')}}</h5>
                                                            <button class="btn-close" type="button" onclick="closeModal()" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form wire:submit="update_user" class="mt-4">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-3">
                                                                        <input wire:model.lazy="form_create_user"  class="form-control rounded-md" type="hidden">
                                                                        <div class="d-flex align-items-center mb-3">
                                                                            <div class="form-floating flex-grow-1">
                                                                                <input wire:model="name" class="form-control rounded-md" id="floatingInput2" type="text" placeholder="name">
                                                                                <label for="floatingInput2">{{ __('Name') }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-danger">
                                                                            @if(isset($validationErrors['name']))
                                                                                @foreach($validationErrors['name'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <div class="d-flex align-items-center mb-3">
                                                                            <div class="form-floating flex-grow-1">
                                                                                <input wire:model="email" class="form-control rounded-md" id="floatingInput2" type="email" placeholder="{{ __('user.email') }}">
                                                                                <label for="floatingInput2">{{ __('Email') }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-danger">
                                                                            @if(isset($validationErrors['email']))
                                                                                @foreach($validationErrors['email'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <div class="d-flex align-items-center mb-3">
                                                                            <div class="form-floating flex-grow-1">
                                                                                <input wire:model="phone" class="form-control rounded-md" id="floatingInput2" type="integer" placeholder="{{ __('user.phone_number') }}">
                                                                                <label for="floatingInput2">{{ __('Phone') }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-danger">
                                                                            @if(isset($validationErrors['phone']))
                                                                                @foreach($validationErrors['phone'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <select wire:model="staff" class="form-select  h-10 px-3 py-3 rounded-md text-sm font-medium" aria-label="Default select example">
                                                                                <option>{{ __('Select Staff') }}</option>
                                                                                <option value="client"> {{__('Client')}}</option>
                                                                                <option value="admin"> {{__('Admin')}}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="text-danger d-block">
                                                                            @if(isset($validationErrors['staff']))
                                                                                @foreach($validationErrors['staff'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <select wire:model="role" class="form-select  h-10 px-3 py-3 rounded-md text-sm font-medium" aria-label="Default select example">
                                                                                <option>{{ __('Select Role') }}</option>
                                                                                <option value="client"> {{__('Client')}}</option>
                                                                                <option value="admin"> {{__('Admin')}}</option>
                                                                                <option value="developer"> {{__('Developer')}}</option>
                                                                                <option value="staff"> {{__('Employee')}}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="text-danger d-block">
                                                                            @if(isset($validationErrors['role']))
                                                                                @foreach($validationErrors['role'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <select wire:model="status" class="form-select  h-10 px-3 py-3 rounded-md text-sm font-medium" aria-label="Default select example">
                                                                                <option>{{ __('Select Status') }}</option>
                                                                                <option value="0">{{__('Inactive')}}</option>
                                                                                <option value="1">{{__('Active')}}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="text-danger">
                                                                            @if(isset($validationErrors['status']))
                                                                                @foreach($validationErrors['status'] as $error)
                                                                                    {{ $error }}<br>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-ghost-secondary" type="button" onclick="closeModal()">{{__('Close')}}</button>
                                                                    <button class="btn btn-ghost-primary">{{('Save')}}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button to trigger the modal -->
                                            <!-- <button id="showModalButton" class="btn btn-primary" type="button">Show Modal</button> -->
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($user)
                                <div class="tab-content rounded-bottom">
                                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1006">
                                        <div class="modal fade" id="modalDeleteUser" tabindex="-1" aria-labelledby="exampleModalPopoversLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalPopoversLabel">{{__('Delete Details of ')}}{{ $user->name }}</h5>
                                                        <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{__('Are You Sure You Want To Delete This User')}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">{{__('Cancel')}}</button>
                                                        <button class="btn btn-primary" type="button" wire:click="deleteUserNow({{ $user->id }})">{{__('Confirm Deletion')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // displays the modal by default
        // document.addEventListener("DOMContentLoaded", function() {
        //     var modalElement = document.getElementById('staticBackdropLive');
        //     var modal = new coreui.Modal(modalElement);
        //     modal.show();
        // });

        function validationErrors(validationErrors) {
            if (validationErrors === null || Object.keys(validationErrors).length === 0) {
                window.location.reload();
            }
        }
        
        function openModal() {
            var modalElement = document.getElementById('staticBackdropLive');
            var modal = new coreui.Modal(modalElement);
            if (modal) {
                modal.show();
            }
        }

        function closeModal() {
            var modalElementIds = ['staticBackdropLive', 'staticCreateUser', 'modalDeleteUser'];
            modalElementIds.forEach(function(id) {
                var modalElement = document.getElementById(id);
                if (modalElement) {
                    var modal = coreui.Modal.getInstance(modalElement);
                    if (modal) {
                        modal.hide();
                    }
                }
            });
            window.location.reload();
        }

        function openCreateUserModal() {
            var modalElement = document.getElementById('staticCreateUser');
            var modal = new coreui.Modal(modalElement);
            if (modal) {
                modal.show();
            }
        }

        function confirmDeleteUser() {
            var modalElement = document.getElementById('modalDeleteUser');
            var modal = new coreui.Modal(modalElement);
            if (modal) {
                modal.show();
            }
        }
    </script>  
     
</div>

