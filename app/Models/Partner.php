<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
        'company_logo',
        'company_location',
        'project_owner',
        'owner_contact',
        'project_title',
        'project_description',
        'project_bill',
        'amount_paid',
        'currency',
        'agreement_documents',
        'domain_name',
        'project_manager',
        'date_paid',
        'developers',
        'txn_status',
        'progress_status',
    ];

    public function projectManager()
    {
        return $this->belongsTo(User::class, 'project_manager', 'id');
    }

}
