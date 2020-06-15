<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVatsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->text('Description');
            $table->string('Percentage');
            $table->integer('is_sales', false, true);
            $table->integer('is_purchase', false, true);
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
        Schema::drop('vats');
    }
}
