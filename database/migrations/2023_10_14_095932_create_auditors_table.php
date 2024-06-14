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
        Schema::create('auditors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('houseNumber_id'); // Use unsignedBigInteger for the foreign key
            $table->foreign('houseNumber_id')->references('id')->on('products');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('address');
            $table->string('phone');
            $table->string('occupation')->nullable();
            $table->string('projectName');
            $table->string('zone');
            $table->string('category')->nullable();
            $table->string('addOn')->nullable();
            $table->string('landSize')->nullable();
            $table->string('area')->nullable();
            $table->string('housePrice');
            $table->string('totalPrice');
            $table->string('downPayment')->nullable();
            $table->string('installment')->nullable();
            $table->string('emi')->nullable();
            $table->string('fileCreation');
            $table->string('idType');
            $table->string('idNumber');
            $table->string('issueDate');
            $table->string('alternaticePhone')->nullable();
            $table->string('docs');
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
        Schema::dropIfExists('auditors');
    }
};
