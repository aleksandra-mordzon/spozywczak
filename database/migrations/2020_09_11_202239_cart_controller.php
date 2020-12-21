<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartController extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_products', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->mediumText('products');
            $table->float('subtotal_price');
            $table->float('total_price');
            $table->string('name');
            $table->string('surname');
            $table->string('city');
            $table->string('street');
            $table->string('postal_address');
            $table->string('phone_number');
            $table->boolean('ispaczkomat');
            $table->string('paczkomat_name')->nullable();
            $table->string('paczkomat_address')->nullable();
            $table->string('paczkomat_address2')->nullable();
            $table->boolean('ispunkt');
            $table->string('punkt_name')->nullable();
            $table->string('punkt_street')->nullable();
            $table->string('punkt_city')->nullable();
            $table->string('status');

            
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
        Schema::dropIfExists('cart_products');
    }
}
