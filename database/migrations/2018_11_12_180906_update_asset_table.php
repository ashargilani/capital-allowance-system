<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('assets');

        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->string('name', 35);
            $table->dateTime('months_used_in_purchased_disposed_year');
            $table->unsignedInteger('no_of_assets_purchased');
            $table->string('description', 55);
            $table->double('purchase_cost');
            $table->double('annual_depreceation');
            $table->double('initial_allowance');
            $table->double('annual_allowance');
            $table->double('investment_allowance');
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
        Schema::drop('assets');
    }
}
