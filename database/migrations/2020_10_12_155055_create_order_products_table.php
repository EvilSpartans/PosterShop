<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('set null');
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('set null');
            $table->integer('quantity')->unsigned();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('order_product');
        Schema::enableForeignKeyConstraints();
    }
}
