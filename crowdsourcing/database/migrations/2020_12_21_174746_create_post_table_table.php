<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_table', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('post_body');
            $table->string('status');
            $table->integer('buyer_id');
            $table->double('amount');
            $table->integer('seller_id')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('buyer_name');
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
        Schema::dropIfExists('post_table');
    }
}
