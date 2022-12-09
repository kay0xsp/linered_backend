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
        Schema::create('bucket_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('serialNumber');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
              ->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bucket_products');
    }
};
