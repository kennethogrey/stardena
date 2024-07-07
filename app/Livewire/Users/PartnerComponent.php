<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Livewire\Home\SessionComponent;
use App\Models\Partner;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Livewire\Users\PartnersTable;

class PartnerComponent extends Component
{
    use SessionComponent;
    public $partner_form, $step, $company_name, $company_logo, $company_location, $project_owner, $owner_contact, $currency, $amount_paid,
        $project_bill, $project_manager, $agreement_documents, $project_description, $project_title, $domain_name, $date_paid,
        $developers = [], $txn_status, $progress_status, $partner_id, $percent_progress, $project_devs, $partner;

    public function mount()
    {
        $this->project_devs = User::where(function($query) {
            $query->where('role', 'developer')
                  ->orWhere('role', 'admin');
        })->where('status', 1)->get();        
    }

    public function viewDescription($partner_id)
    {
        $this->partner = Partner::findOrFail($partner_id);
        $this->js('viewDescription()');
        // we continue frm here
    }

    public function openCreatePartnerForm():void 
    {
        $this->partner_form = 'create_partner';
        $this->step = 'step_one';
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
            $create_partner = new Partner();
            foreach ($validatedPartner as $field => $value) {
                if (!is_null($value)) {
                    $create_partner->$field = $value;
                }
            } 
            $create_partner->save();

            if (!$create_partner) {
                $error_status = throw new Exception("Error Processing Request", 1);
                session()->flash('danger', __($error_status));
            } else {
                session()->flash('success', 'Data Stored Successfully');
                $this->step = 'step_two';
                $this->partner_id = $create_partner->id;
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

            $update_partner = Partner::findOrFail($this->partner_id);
            if (!$update_partner) {
                $error_status = throw new Exception("Error Processing Request", 1);
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
                $this->step = '';
                $this->reset();
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
