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
        Schema::create('customers_hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("hotel_id");
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("hotel_id")->references("id")->on("hotels")->onDelete("cascade")->onUpdate("cascade");
            $table->unique(["customer_id","hotel_id"]);
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
        Schema::dropIfExists('customers_hotels');
    }
};
