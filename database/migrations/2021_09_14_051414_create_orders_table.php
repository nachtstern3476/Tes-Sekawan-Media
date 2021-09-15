<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Driver;
use App\Models\Vehicle;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spt_orders', function (Blueprint $table) {
            $table->id('_id');  
            $table->integer('driver_id');
            $table->integer('vehicle_id');
            $table->integer('user_approval_id');
            $table->integer('user_input_id');
            $table->text('message');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('spt_orders');
    }
}
