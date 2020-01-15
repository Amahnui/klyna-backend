<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWashOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wash_order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('washing_order_id');
            $table->foreign('washing_order_id')->references('id')->on('washing_orders');
            $table->unsignedInteger('wash_item_id');
            $table->foreign('wash_item_id')->references('id')->on('wash_items');
            $table->double('quantity');
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
        Schema::dropIfExists('wash_order_items');
    }
}
