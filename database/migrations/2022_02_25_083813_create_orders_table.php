<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
            $table->string('customer_name', 100);
            $table->string('customer_surname', 100);
            $table->string('customer_email');
            $table->string('customer_phone', 20);
            $table->string('delivery_address', 150);
            $table->decimal('final_price', 6, 2);

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
        Schema::dropIfExists('orders');
    }
}
