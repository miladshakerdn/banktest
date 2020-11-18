<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->collation = 'utf8_persian_ci';
            $table->id();
            $table->string('terminalId', 250);
            $table->integer('amount');
            $table->string('localDate', 250);
            $table->string('localTime_', 250);
            $table->text('additionalData')->nullable();
            $table->text('callBackUrl');
            $table->string('payerId', 250);
            $table->string('orderId', 250);
            $table->string('saleOrderId', 250)->nullable();
            $table->string('saleReferenceId', 250)->nullable();
            $table->string('subServiceId', 250)->nullable();
            $table->text('CardHolderInfo')->nullable();
            $table->integer('userId')->nullable();
            $table->string('RefId', 250)->nullable();
            $table->string('ResCode', 250)->nullable();
            $table->string('action', 250)->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->boolean('verify')->nullable()->default(0);
            $table->boolean('reverse')->default(0);
            $table->boolean('settle')->default(0);
            $table->integer('time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pays');
    }
}
