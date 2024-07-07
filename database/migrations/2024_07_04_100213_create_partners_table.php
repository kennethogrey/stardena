<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('company_location')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('project_owner')->nullable();
            $table->string('owner_contact')->nullable();
            $table->string('project_title')->nullable();
            $table->longtext('project_description')->nullable();
            $table->string('domain_name')->nullable();
            $table->integer('project_bill')->nullable();
            $table->integer('amount_paid')->nullable();
            $table->string('currency')->nullable();
            $table->string('agreement_documents')->nullable();
            $table->string('date_paid')->nullable();
            $table->string('project_manager')->nullable();
            $table->string('developers')->nullable();
            $table->integer('percent_progress')->nullable();
            $table->enum('txn_status', ['unpaid', 'incomplete', 'completed'])->default('unpaid');
            $table->enum('progress_status', ['progress' ,'pending', 'completed'])->default('progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
