<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spt_drivers', function (Blueprint $table) {
            $table->id('_id');
            $table->string('name');
            $table->enum('gender', ['L', 'P']);
            $table->dateTime('birthdate');
            $table->text('address');
            $table->string('phone');
            $table->string('photo');
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spt_drivers');
    }
}
