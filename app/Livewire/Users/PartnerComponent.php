<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Livewire\Home\SessionComponent;
use App\Models\Partner;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PartnerComponent extends Component
{
    use SessionComponent;
    use WithFileUploads;
    public $partner_form, $step = 'step_zero', $company_name, $company_logo, $company_location, $project_owner, $owner_contact, $currency, $amount_paid,
        $project_bill, $project_manager, $agreement_documents=[], $project_description, $project_title, $domain_name, $date_paid,
        $developers = [], $txn_status, $progress_status, $partner_id, $percent_progress, $project_devs, $partner, $partner_details,
        $developerNames = [], $edit_form = 'false';

    public function mount()
    {
        $this->project_devs = User::where(function($query) {
            $query->where('role', 'developer')
                  ->orWhere('role', 'admin');
        })->where('status', 1)->get();        
    }

    public function updateCompanyDocs(): void
    {
        $this->validate([
            // 'agreement_documents' => 'required',
            'agreement_documents.*' => 'required|file|mimes:doc,docx,pdf,txt,sql|max:20480', // 20MB Max per file
        ]);

        $partner = Partner::find($this->partner_id);
        if ($partner) {
            $existingDocuments = $partner->agreement_documents ? json_decode($partner->agreement_documents, true) : [];

            foreach ($this->agreement_documents as $document) {
                $file_extension = $document->getClientOriginalExtension();
                $file_name = 'doc_' . time() . '_' . uniqid() . '.' . $file_extension;
                $document->storeAs('public/files/', $file_name);
                $existingDocuments[] = $file_name;
            }

            // Encode the updated array back into a JSON string
            $partner->agreement_documents = json_encode($existingDocuments);
            $partner->save();

            session()->flash('success', 'Documents Stored Successfully');
        } else {
            session()->flash('danger', 'Something Went Wrong');
        }
    }

    public function updateCompanyLogo(): void
    {
        $this->validate([
            'company_logo' => 'required|file|mimes:png,jpeg,jpg|max:5120',
        ]);

        $image_extension = $this->company_logo->getClientOriginalExtension();
        $image_name = 'logo_' . time() . '.' . $image_extension;
        $this->company_logo->storeAs('public/files/logos/', $image_name);
        $partner = Partner::find($this->partner_id);
        if ($partner) {
            // delete previous Image
            \Storage::delete('public/files/logos/' . $partner->company_logo);
            $partner->company_logo = $image_name;
            $partner->save();
            $this->dispatch('logo-updated', ['name' => $partner->company_logo]);  
            session()->flash('success', 'Logo Stored Successfully'); 
        } else{
            session()->flash('danger', 'Something Went Wrong'); 
        }
    }

    #[\Livewire\Attributes\On('deletePartner')]
    public function deletePartner($partner_id):void
    {
        $this->partner_id = $partner_id;
        if (Auth::user()->role !== 'admin') {
            session()->flash('warning', __('You Don\'t Have Permissions To Delete a Partner'));
        } else {
            $this->partner = Partner::find($partner_id);
            $this->js('deletePartner()');
        }
    }

    public function deletePartnerNow($partner_id): void
    {
        $partner = Partner::find($partner_id);
        if ($partner) {
            $agreementDocuments = $partner->agreement_documents ? json_decode($partner->agreement_documents, true) : [];
            if (!empty($agreementDocuments)) {
                foreach ($agreementDocuments as $document) {
                    \Storage::delete('public/files/docs/' . $document);
                }
            }
            // Delete Company Logo if it exists
            if ($partner->company_logo) {
                \Storage::delete('public/files/logos/' . $partner->company_logo);
            }
            $partner->delete();
            session()->flash('success', 'Data Deleted Successfully');
        } else {
            session()->flash('danger', 'Partner Not Found');
        }

        $this->js('closeModal()');
    }


    #[\Livewire\Attributes\On('show')]
    public function show($partner_id): void
    {
        $this->partner_form == 'edit_partner';
        $this->step == 'step_one';

        $this->partner_id = $partner_id;
        $this->partner = Partner::with('projectManager')->where('id', $partner_id)->first();
        $this->partner_details = 'isOpen';

        $developerIdsString = str_replace(['[', ']', '"'], '', $this->partner->developers);
        $developerIds = array_map('trim', explode(',', $developerIdsString));
        $this->developerNames = User::whereIn('id', $developerIds)->pluck('name')->toArray();

    }

    public function openCreatePartnerForm():void 
    {
        $this->partner_form = 'create_partner';
        $this->step = 'step_one';
        
        /* Reuse the form for edit */
        if (isset($this->partner_id)) {
            $this->edit_form = 'true';
            $partner = Partner::find($this->partner_id);
            $this->company_name = $partner->company_name;
            $this->company_location = $partner->company_location;
            $this->project_owner = $partner->project_owner;
            $this->owner_contact = $partner->owner_contact;
            $this->project_manager = $partner->project_manager;
            $this->project_title = $partner->project_title;
            $this->domain_name = $partner->domain_name;
            $this->project_description = $partner->project_description;
            
        }
    }

    public function storePartner():void
    {
        \Artisan::call('optimize:clear');
        if ($this->step == 'step_one') {
            $validatedPartner = $this->validate([
                'company_name' => 'required|string|max:225',
                'company_location' => 'required|string|max:225',
                'project_owner' => 'required|string|max:225',
                'owner_contact' => 'required|string|max:225',
                'project_title' => 'required|string|max:225',
                'domain_name' => 'required|string|max:225',
                'project_description' => 'required|string|max:2025',
                'project_manager' => 'required|integer|max:225',
            ]);

            if ($this->edit_form === 'true') {
                $partner = Partner::find($this->partner_id);
                $partner->update($validatedPartner);
                if ($partner) {
                    /** Edit step 2 */
                    $this->edit_form = 'true2';
                    $this->project_bill = $partner->project_bill;
                    $this->amount_paid = $partner->amount_paid;
                    $this->currency = $partner->currency;
                    $this->date_paid = $partner->date_paid;
                    $this->percent_progress = $partner->percent_progress;
                    $this->txn_status = $partner->txn_status;
                    $this->progress_status = $partner->progress_status;
                    $this->partner_id = $partner->id;
                    session()->flash('success', 'Data Updated Successfully');
                    $this->step = 'step_two';
                } else {
                    $error_status = throw new \Exception("Error Processing Request", 1);
                    session()->flash('danger', __($error_status));
                }
            } else {
                $create_partner = new Partner();
                foreach ($validatedPartner as $field => $value) {
                    if (!is_null($value)) {
                        $create_partner->$field = $value;
                    }
                } 
                $create_partner->save();

                if (!$create_partner) {
                    $error_status = throw new \Exception("Error Processing Request", 1);
                    session()->flash('danger', __($error_status));
                } else {
                    session()->flash('success', 'Data Stored Successfully');
                    $this->step = 'step_two';
                    $this->partner_id = $create_partner->id;
                }
            }

        }elseif ($this->step == 'step_two') {
            $validatedPartner = $this->validate([
                'project_bill' => 'required|integer',
                'amount_paid' => ['required', 'integer', function ($attribute, $value, $fail) {
                    if ($value > $this->project_bill) {
                        $fail('The amount paid cannot be greater than the project bill.');
                    }
                }],
                'currency' => 'required|string|max:225',
                'date_paid' => 'required|string|max:225',
                'developers' => 'required|array|max:225',
                'percent_progress' => 'required|integer|between:1,100',
                'txn_status' => 'required|string|in:unpaid,incomplete,completed',
                'progress_status' => 'required|string|in:progress,pending,completed',
            ]);

            if ($this->edit_form === 'true2') {
                $partner = Partner::find($this->partner_id);
                $partner->update($validatedPartner);
                if ($partner) {
                    session()->flash('success', 'Data Updated Successfully');
                    $this->partner_form = '';
                    $this->step = '';
                    $this->edit_form = '';
                    $this->partner_id = '';
                    $this->reset();
                    $this->js('closeModal()');
                } else {
                    $error_status = throw new \Exception("Error Processing Request", 1);
                    session()->flash('danger', __($error_status));
                }
            } else {
                $update_partner = Partner::findOrFail($this->partner_id);
                if (!$update_partner) {
                    $error_status = throw new \Exception("Error Processing Request", 1);
                    session()->flash('danger', __($error_status));
                }else {
                    foreach ($validatedPartner as $field => $value) {
                        if (!is_null($value)) {
                            $update_partner->$field = $value;
                        }
                    } 
                    $update_partner->save();
                    session()->flash('success', 'Partnership Sealed Successfully');
                    $this->partner_form = '';
                    $this->partner_id = '';
                    $this->step = '';
                    $this->reset();
                    $this->js('closeModal()');
                }
            }
        }
    }

    public function render()
    {   
        return view('livewire.users.partner-component', [
            'project_devs' => $this->project_devs,
        ]);
    }
}
