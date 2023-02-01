<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('size_id');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);

            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');

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
        Schema::dropIfExists('purchased_items');
    }
}
