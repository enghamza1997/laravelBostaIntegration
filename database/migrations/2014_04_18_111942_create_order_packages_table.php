<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references(config('bosta.order_table.order_id_filed_name'))
            ->on(config('bosta.order_table.table_name'))->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->string('tracking_number', 255)->nullable();
            $table->string('request_id', 100)->nullable();
            $table->string('sender_id', 100)->nullable();
            $table->string('sender_phone', 100)->nullable();
            $table->string('sender_name', 100)->nullable();
            $table->string('account_type', 100)->nullable();
            $table->string('sub_account_id', 100)->nullable();
            $table->boolean('is_confirmed_delivery')->default(0);
            $table->boolean('fulfilled')->default(false);
            $table->date('delivery_promise_date')->nullable();
            $table->integer('last_state')->nullable();
            $table->string('last_meassage', 255)->nullable();
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
        Schema::dropIfExists('order_packages');
    }
}
