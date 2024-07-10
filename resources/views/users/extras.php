function(Partner $partner) {
                $developers = $partner->with('projectManager')->get();
                $project_developers = [];
            
                foreach ($developers as $developer) {
                    $managerName = $developer->projectManager->name;
                    if (!in_array($managerName, $project_developers)) {
                        $project_developers[] = $managerName;
                    }
                }
                return implode(', ', $project_developers);
                                            
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="company_logo">{{ __('Partner/Company Logo') }}</label>
                                                        <input wire:model="company_logo" id="company_logo" name="company_logo" class="form-control" type="file" aria-label="file example">
                                                        @error('company_logo')
                                                            <div class=" text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="agreement_documents">{{ __('Contract Agreement Documents (include SRS, SDD, etc)') }}</label>
                                                        <input wire:model="agreement_documents" class="form-control" type="file" >
                                                        @error('agreement_documents')
                                                            <div class=" text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>