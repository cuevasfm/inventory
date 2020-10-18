<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->string('name_part', 100);
            $table->integer('category_id');
            $table->string('model', 100)->nullable();
            $table->string('sn', 100)->nullable();
            $table->string('processor', 100)->nullable();
            $table->string('memory', 40)->nullable();
            $table->string('storage', 100)->nullable();
            $table->enum('wifi', ['N/A', 'YES', 'NO']);
            $table->string('resolution', 100)->nullable();
            $table->string('screen_size', 100)->nullable();
            $table->date('date_purchase')->nullable();
            $table->string('data_add', 200)->nullable();
            $table->string('img', 100)->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('parts');
    }
}
