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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('national_id');
            $table->string('companyCommercialRegister');
            $table->boolean('isRecordedAddedValue');
            $table->boolean('isTaxCompliant');
            $table->string('terrorismFunding');
            $table->string('paymentFunding');
            $table->string('user_email');
            $table->foreign('user_email')
                ->references('email')->on('users');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
