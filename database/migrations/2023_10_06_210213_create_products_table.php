<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projectName_id'); // Use unsignedBigInteger for the foreign key
            $table->foreign('projectName_id')->references('id')->on('projects'); // Reference the id column of the projects table
            $table->string('zone');
            $table->string('houseNumber');
            $table->string('category');
            $table->string('addOn')->nullable();
            $table->string('price');
            $table->string('landSize');
            $table->string('area');
            $table->string('totalAmount')->nullable();
            $table->string('intrestRate')->nullable();
            $table->string('monthTime')->nullable();
            $table->string('totalPayment')->nullable();
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
        Schema::dropIfExists('products');
    }
};