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
        Schema::create('parts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tasks_id');
            $table->foreign('tasks_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->string('partName');
            $table->float('partQty')->default('0');
            $table->float('partPrice')->default('0');
            $table->float('partsTotal')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
};
