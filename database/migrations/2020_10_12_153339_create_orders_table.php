<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->string('paiement_firstname');
            $table->string('paiement_lastname');
            $table->string('paiement_email');
            $table->string('paiement_province');
            $table->string('paiement_address');
            $table->string('paiement_city');
            $table->string('paiement_postalcode');
            $table->string('discount')->nullable();
            $table->string('paiement_total');
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
        Schema::dropIfExists('orders');
    }
}
