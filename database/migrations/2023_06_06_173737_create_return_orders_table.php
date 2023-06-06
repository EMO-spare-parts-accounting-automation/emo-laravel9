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
        Schema::create('return_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('orderid');
            $table->integer('productid');
            $table->text('customerfeedback');
            $table->text('adminfeedback')->default('Firma cevabı bekleniyor!');
            $table->boolean('returncost')->default(false);
            $table->boolean('refreshproduct')->default(false);
            $table->string('status')->default('Bekleniyor');
            $table->timestamp('orderDate')->useCurrent();
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
        Schema::dropIfExists('return_orders');
    }
};
