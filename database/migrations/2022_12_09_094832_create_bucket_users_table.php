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
        Schema::create('bucket_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('serialNumber');
            $table->unsignedBigInteger('userproduct_id');
            $table->foreign('userproduct_id')
              ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bucket_users');
    }
};
