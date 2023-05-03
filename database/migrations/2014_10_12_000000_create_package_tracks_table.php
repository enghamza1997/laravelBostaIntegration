<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('request_id')->nullable();
            $table->foreignId('order_package_id')->references('id')->on('order_packages');
            $table->foreignId('state_code')->references('state_code')->on('package_states');
            $table->bigInteger('exception_code')->nullable();
            $table->string('exception_reason', 255)->nullable();
            $table->date('delivery_promise_date')->nullable();
            $table->boolean('is_confirmed_delivery')->default(0);
            $table->double('cod')->default(0);
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
        Schema::dropIfExists('package_tracks');
    }
}
