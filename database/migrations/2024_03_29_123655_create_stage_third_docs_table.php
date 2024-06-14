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
        Schema::create('stage_third_docs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->unsignedBigInteger('houseNumber')->unique();
            $table->foreign('houseNumber')->references('id')->on('salesmen');
            $table->string("dateIssue");
            $table->string("workPlace");
            $table->string("buyerName");
            $table->string("phone");
            $table->string("address");
            $table->string("priceAddOn");
            $table->string("emiPeriod");
            $table->string("firstInstallment");
            $table->string("zone");
            $table->string("addOn");
            $table->string("buyersign");
            $table->string("dateIssueFile");
            $table->string("idNumber");
            $table->string("occupation");
            $table->string("category");
            $table->string("housePrice");
            $table->string("buildArea");
            $table->string("landArea");
            $table->string("agentsign");
            $table->string("accountantsign");
            $table->string("role");
            $table->softDeletes();
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
        Schema::dropIfExists('stage_third_docs');
    }
};
