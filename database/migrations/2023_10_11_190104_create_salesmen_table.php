<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesmen', function (Blueprint $table) {
            $table->id();
            $table->string('idNumber');
            $table->unsignedBigInteger('houseNumber_id'); // Use unsignedBigInteger for the foreign key
            $table->foreign('houseNumber_id')->references('id')->on('products');
            $table->string('zone');
            $table->string('category');
            $table->string('addOn')->nullable();
            $table->string('emi')->nullable();
            $table->string('landSize');
            $table->string('area');
            $table->string('price');
            $table->string('emiAmount')->nullable();
            $table->string('downPayment')->nullable();
            $table->string('AuditorData');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesmen');
    }
};
