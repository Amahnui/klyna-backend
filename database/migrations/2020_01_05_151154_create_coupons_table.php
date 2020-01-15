<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->float('price')->nullable();
            $table->string('type')->nullable();
            $table->string('discount_type');
            $table->text('description')->nullable();
            $table->date('expiration_date')->nullable();
            $table->integer('usage_count')->default(0);
            $table->boolean('exclude_sale_items')->default(True);
            $table->boolean('individual_use')->default(false);
            $table->string('service')->nullable();
            $table->integer('usage_limit')->nullable();
            $table->float('minimum_limit')->nullable();
            $table->float('maximum_limit')->nullable();
            $table->float('usage_limit_per_user')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
