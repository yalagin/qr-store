<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('main_description')->nullable();
            $table->text('additional_description')->nullable();
            $table->text('minor_description')->nullable();
            $table->smallInteger('main_product', false, true);
            $table->string('price');
            $table->smallInteger('active', false, true);
            $table->smallInteger('sold_out', false, true);
            $table->string('ean')->nullable();
            $table->smallInteger('is_receipt', false, true);
            $table->smallInteger('is_kitchen', false, true);
            $table->smallInteger('is_sticker', false, true);
            $table->smallInteger('is_deal', false, true);
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
        Schema::drop('products');
    }
}
