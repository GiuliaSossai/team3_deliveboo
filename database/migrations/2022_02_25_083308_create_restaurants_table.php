<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            //colonna con fk per tabellla users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('name', 100);
            $table->string('slug', 100);
            $table->string('p_iva', 20);
            $table->string('address');
            $table->string('email');
            $table->string('phone', 25);
            $table->decimal('delivery_price', 4, 2)->default(0);
            $table->tinyInteger('delivery_time')->default(30);
            $table->decimal('order_min', 4, 2)->default(0);
            $table->string('photo')->nullable();
            $table->string('photo_bg')->nullable();

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
        Schema::dropIfExists('restaurants');
    }
}
