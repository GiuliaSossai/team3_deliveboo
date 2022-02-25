<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_order', function (Blueprint $table) {
            $table->id();

            //FK della tabella Dishes
            $table->foreignId('dish_id')->constrained()->onDelete('cascade');
            //FK della tabella Orders
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            // Colonna relativa alla quantità di un relativo cibo
            $table->tinyInteger('quantity');

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
        Schema::dropIfExists('dish_order');
    }
}
