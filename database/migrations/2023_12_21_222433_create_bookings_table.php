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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ticket_id");
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("hotel_id")->nullable();
            $table->dateTime("book_date");
            $table->foreign("ticket_id")->references("id")->on("tickets")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("customer_id")->references("id")->on("customers");
            $table->foreign("hotel_id")->references("id")->on("hotels")->onDelete("SET NULL");
            $table->unique(["ticket_id","customer_id","hotel_id"]);
            $table->unique(["ticket_id","customer_id"]);
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
        Schema::dropIfExists('bookings');
    }
};
