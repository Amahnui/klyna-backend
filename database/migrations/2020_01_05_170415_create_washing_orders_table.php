<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWashingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('washing_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_number');
            $table->unsignedInteger('customer');
            $table->string('coupon')->nullable();
            $table->string('order_status');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('paid_amount');
            $table->date('paid_date');
            $table->date('date_completed');
            $table->string('items');
            $table->float('item_count');
            $table->integer('pickup_agent');          
            $table->integer('store_agent');           
            $table->integer('washing_agent');
            $table->integer('delivery_agent');            
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('store_agent')->references('id')->on('users');
            $table->foreign('pickup_agent')->references('id')->on('users');
            $table->foreign('washing_agent')->references('id')->on('users');
            $table->foreign('delivery_agent')->references('id')->on('users');
            $table->foreign('customer')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('washing_orders');
    }
}
