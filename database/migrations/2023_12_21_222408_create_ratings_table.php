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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("hotel_id");
            $table->unsignedBigInteger("customer_id");
            $table->enum("rate",[0,1,2,3,4,5])->default(0);
            $table->string("comment")->nullable();
            $table->foreign("hotel_id")->references("id")->on("hotels")->onDelete("CASCADE")->onUpdate("cascade");
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade")->onUpdate("cascade");
            $table->unique(["hotel_id","customer_id"]);
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
        Schema::dropIfExists('ratings');
    }
};
