<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>{{__('Inventory Systems Table')}}</strong>
            <button class="btn btn-ghost-primary" wire:click="openCreateSystemModal">{{ __('Add Systems/App') }}</button>
        </div>
        <div class="card-body">
            @if ($create_system)
                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1003">
                        <form wire:submit="storeSystem" class="was-validated">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="inventory_name">{{ __('System/Inventory Name') }}</label>
                                        <input wire:model="inventory_name" id="inventory_name" name="inventory_name" class="form-control" type="text" aria-label="text example"  >
                                        @error('inventory_name')
                                            <div class=" text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
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
                                <div class="col-md-6">
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
        </div>
    </div>
</div>
