<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('service');
            $table->float('price');
            $table->date('expiration_date');
            $table->boolean('is_used')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gift_cards');
    }
}
