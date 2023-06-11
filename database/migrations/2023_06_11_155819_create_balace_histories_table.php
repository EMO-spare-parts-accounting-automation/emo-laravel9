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
        Schema::create('balace_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('orderid')->nullable();
            $table->double('payment');
            $table->double('totalbalance');
            $table->string('status');
            $table->timestamp('transactiondate')->useCurrent();
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
        Schema::dropIfExists('balace_histories');
    }
};
