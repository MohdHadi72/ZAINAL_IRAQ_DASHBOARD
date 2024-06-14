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
        Schema::create('stage_first_docs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('buyerName');
            $table->string('houseNumber')->unique();
            $table->string('dateIssue');
            $table->string('amountNumber');
            $table->string('amountWords');
            $table->string('role');
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
        Schema::dropIfExists('stage_first_docs');
    }
};
