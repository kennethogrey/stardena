<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}    <div class="row">
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
                        <strong>{{__('Partners')}}</strong>
                        <button class="btn btn-ghost-primary" wire:click="openCreatePartnerForm">
                            @if($step == '') {{ __('Add Partner') }} @endif
                        </button>
                    </div>
                    <div class="card-body">
                        @if ($partner_form == 'create_partner' && $step == 'step_one')
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1003">
                                    <form wire:submit="storePartner" class="was-validated">
                                        <input wire:model="step" id="step" name="step" class="form-control" type="hidden">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="company_name">{{ __('Partner/Company Name') }}</label>
                                                    <input wire:model="company_name" id="company_name" name="company_name" class="form-control" type="text" aria-label="text example"  >
                                                    @error('company_name')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="company_location">{{ __('Partner/Company Location') }}</label>
                                                    <input wire:model="company_location" id="company_location" name="company_location" class="form-control" type="text" aria-label="text example"  >
                                                    @error('company_location')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="project_owner">{{ __('Project Representative') }}</label>
                                                    <input wire:model="project_owner" id="project_owner" name="project_owner" class="form-control" type="text" aria-label="text example"  >
                                                    @error('project_owner')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="owner_contact">{{ __('Representative Contact') }}</label>
                                                    <input wire:model="owner_contact" id="owner_contact" name="owner_contact" class="form-control" type="text" aria-label="text example"  >
                                                    @error('owner_contact')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="project_manager">{{ __('Project Manager') }}</label>
                                                    <select wire:model="project_manager" id="project_manager" name="project_manager" class="form-select" aria-label="select example">
                                                        <option value="">{{ __('Open this select menu') }}</option>
                                                        @foreach ($project_devs as $manager)
                                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('project_manager')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="project_title">{{ __('Project Title') }}</label>
                                                    <input wire:model="project_title" id="project_title" name="project_title" class="form-control" type="text" aria-label="text example"  >
                                                    @error('project_title')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="domain_name">{{ __('Domain Link') }}</label>
                                                    <input wire:model="domain_name" id="domain_name" name="domain_name" class="form-control" type="text" aria-label="text example"  >
                                                    @error('domain_name')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="project_description">Project Description</label>
                                            <textarea wire:model="project_description" id="project_description" name="project_description"class="form-control is-invalid" id="validationTextarea" placeholder="Write a brief summary of the project"  ></textarea>
                                            @error('project_description')
                                                <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-ghost-primary" type="submit">{{__('Next Step')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @elseif ($partner_form == 'create_partner' && $step == 'step_two')
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1003">
                                    <form wire:submit="storePartner" class="was-validated">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="compproject_billany_name">{{ __('Total Project Cost (USD/UGX)') }}</label>
                                                    <input wire:model="project_bill" id="project_bill" name="project_bill" class="form-control" type="text" aria-label="text example"  >
                                                    @error('project_bill')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="amount_paid">{{ __('Amount Paid') }}</label>
                                                    <input wire:model="amount_paid" id="amount_paid" name="amount_paid" class="form-control" type="text" aria-label="text example"  >
                                                    @error('amount_paid')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="currency">{{ __('Select Currency') }}</label>
                                                        <select wire:model="currency" id="currency" name="currency" class="form-select"   aria-label="select example">
                                                            <option value>Open this select menu</option>
                                                            <option value="USD">USD</option>
                                                            <option value="UGX">UGX</option>
                                                            <option value="EUR">EUR</option>
                                                        </select>
                                                    @error('currency')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="date_paid">{{ __('Date Paid') }}</label>
                                                    <input wire:model="date_paid" id="date_paid" name="date_paid" class="form-control" type="date" aria-label="text example"  >
                                                    @error('date_paid')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="currency">{{ __('Select Percentage Progress') }}</label>
                                                    <input wire:model="percent_progress" id="percent_progress" name="percent_progress" class="form-control" type="integer" aria-label="text example"  >
                                                    @error('percent_progress')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label" for="developers">Select Project Developers</label>
                                                @foreach ($project_devs as $manager)
                                                    <div class="form-check mb-3">
                                                        <input type="checkbox" value="{{ $manager->id }}" id="{{ $manager->id }}" wire:model="developers" class="form-check-input">
                                                        <label class="form-check-label" for="{{ $manager->name }}">{{ $manager->name }}</label>
                                                    </div>
                                                @endforeach
                                                @error('developers')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="txn_status">Select Transaction Status</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" wire:model="txn_status" id="unpaid" value="unpaid">
                                                    <label class="form-check-label" for="unpaid">Unpaid</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" wire:model="txn_status" id="incomplete" value="incomplete">
                                                    <label class="form-check-label" for="incomplete">Incomplete</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" wire:model="txn_status" id="completed" value="completed">
                                                    <label class="form-check-label" for="completed">Completed</label>
                                                </div>
                                                @error('txn_status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="developers">Select Project Status</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" wire:model="progress_status" id="progress" value="progress">
                                                    <label class="form-check-label" for="progress">Progress</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" wire:model="progress_status" id="pending" value="pending">
                                                    <label class="form-check-label" for="pending">Pending</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" wire:model="progress_status" id="completed" value="completed">
                                                    <label class="form-check-label" for="completed">Completed</label>
                                                </div>
                                                @error('progress_status')
                                                    <div class=" text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-ghost-primary" type="submit">{{__('Complete Partnership')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <livewire:users.partners-table/>
                        @endif
                        
                        <div class="example">
                                <div class="tab-content rounded-bottom">
                                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1002">
                                        <div class="modal fade" id="viewProjectDescription" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLiveLabel">View Project Description</h5>
                                                        <button class="btn-close" type="button" onclick="closeModal()" aria-label="Close"></button>
                                                    </div>
                                                    @if (!empty($partner))
                                                        <div class="modal-body">
                                                            {{}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button to trigger the modal -->
                                        <!-- <button id="showModalButton" class="btn btn-primary" type="button">Show Modal</button> -->
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script>
        function viewDescription() {
            var modalElement = document.getElementById('viewProjectDescription');
            var modal = new coreui.Modal(modalElement);
            if (modal) {
                modal.show();
            }
        }

        function closeModal() {
            var modalElementIds = ['viewProjectDescription'];
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
    </script>              
</div>
