<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row mb-4">
        <div class="col-xl-7 col-xxl-4">
            <p>
                @include('livewire.home.session-component')
            </p>
        </div>
    </div> 
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>{{__('Inventory Systems Table')}}</strong>
            @if (!$create_system || $edit_system)
                <button class="btn btn-ghost-primary" wire:click="openCreateSystemModal">{{ __('Add Systems/App') }}</button>
            @else
                <button class="btn btn-ghost-primary" wire:click="openSysytemTable">{{ __('View Table') }}</button>
            @endif
        </div>
        <div class="card-body">
            @if ($create_system || $edit_system)
                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1003">
                        <form wire:submit="storeSystem" class="was-validated">
                        <input wire:model="system_id" id="system_id" name="system_id" type="hidden" aria-label="text example">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="inventory_name">{{ __('System/Inventory Name') }}</label>
                                        <input wire:model="inventory_name" id="inventory_name" name="inventory_name" class="form-control" type="text" aria-label="text example">
                                        @error('inventory_name')
                                            <div class=" text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="demo_link">{{ __('APP/Demo URL') }}</label>
                                        <input wire:model="demo_link" id="demo_link" name="demo_link" class="form-control" type="text" aria-label="text example">
                                        @error('demo_link')
                                            <div class=" text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="image">{{ __('Select Image UI') }}</label>
                                            <select wire:model="image" id="image" name="image" class="form-select"   aria-label="select example">
                                                <option value>Open this select menu</option>
                                                <option value="1.jpg">Statistics </option>
                                                <option value="2.jpg">Search </option>
                                                <option value="3.jpg">Setting </option>
                                                <option value="4.jpg">Computer </option>
                                                <option value="5.jpg">Paper Fold </option>
                                            </select>
                                        @error('image')
                                            <div class=" text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="software_category">{{ __('Select Application Category') }}</label>
                                        <select wire:model="software_category" id="software_category" name="software_category" class="form-select"   aria-label="select example">
                                            <option value>Open this select menu</option>
                                            <option value="Web Application">Web Application </option>
                                            <option value="System Application">System Application </option>
                                            <option value="Mobile Application">Mobile Application </option>
                                        </select>
                                        @error('software_category')
                                            <div class=" text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="system_status">{{ __('Select Status') }}</label>
                                        <select wire:model="system_status" id="system_status" name="system_status" class="form-select"   aria-label="select example">
                                            <option value>Open this select menu</option>
                                            <option value="1">Active </option>
                                            <option value="0">Inactive </option>
                                        </select>
                                        @error('system_status')
                                            <div class=" text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-ghost-primary" type="submit">{{__('Save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <livewire:software.system-table/>
            @endif       
            <div class="example">
                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1002">
                        <div class="modal fade" id="deleteSystem" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLiveLabel">{{__('Confirm Delete Action')}}</h5>
                                        <button class="btn-close" type="button" data-coreui-dismiss="modal"></button>
                                    </div>
                                    @if ($delete_system)
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalPopoversLabel">{{__('Delete Details of ')}}{{ $inventory_name }}</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{__('Are You Sure You Want To Delete the System Details')}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">{{__('Cancel')}}</button>
                                            <button class="btn btn-primary" type="button" wire:click="deleteSystemNow({{ $system_id }})">{{__('Confirm Deletion')}}</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteSystem() {
            var modalElement = document.getElementById('deleteSystem');
            var modal = new coreui.Modal(modalElement);
            if (modal) {
                modal.show();
            }
        }

        function closeModal() {
            var modalElement = document.getElementById('deleteSystem');
            var modal = new coreui.Modal(modalElement);
            if (modal) {
                modal.hide();
            }
        }

        function refreshPage() {
            window.location.reload();
        }
    </script>
</div>
