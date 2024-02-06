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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('address')->nullable(false);
            $table->char('zipcode')->nullable(false);
            $table->date('birth_date')->nullable(false);
            $table->date('hired_date')->nullable(false);
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')
                ->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')
                ->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
