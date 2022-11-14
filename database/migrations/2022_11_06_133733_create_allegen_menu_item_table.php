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
        Schema::create('allegen_menu_item', function (Blueprint $table) {
            $table->unsignedBigInteger('allegen_id');
            $table->unsignedBigInteger('menu_item_id');

            $table->foreign('allegen_id')
                ->references('id')
                ->on('allegens')
                ->onDelete('cascade');
            $table->foreign('menu_item_id')
                ->references('id')
                ->on('menu_items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allegens_menu_items');
    }
};
