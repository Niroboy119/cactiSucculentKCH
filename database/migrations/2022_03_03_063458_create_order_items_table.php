<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_Id')->index();
            $table->unsignedBigInteger('product_Id')->index();
            $table->unsignedInteger('quantity');
            $table->decimal('price', 20, 6);

            $table->foreign('order_Id')->references('order_Id')->on('orders')->onDelete('cascade');
            $table->foreign('product_Id')->references('Product_ID')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('order_items');
    }
}
