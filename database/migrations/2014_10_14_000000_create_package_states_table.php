<?php

use BiztechEG\laravelBostaIntegration\Models\PackageState;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_states', function (Blueprint $table) {
            $table->bigInteger('state_code')->primary()->unsigned();
            $table->string('state_value', 100);
            $table->string('type')->nullable();
        });

        PackageState::insert([
            ['state_value' => 'Pickup requested', 'type' => 'All Except Cash Collection', 'state_code' => 10],
            ['state_value' => 'Waiting for route', 'type' => 'Cash Collection', 'state_code' => 11],
            ['state_value' => 'Route Assigned', 'type' => 'All Types', 'state_code' => 20],
            ['state_value' => 'Picked up from business', 'type' => 'Deliver - Exchange - Sign Return', 'state_code' => 21],
            ['state_value' => 'Picking up from consignee', 'type' => 'CRP - Exchange - Sign Return', 'state_code' => 22],
            ['state_value' => 'Picked up from consignee', 'type' => 'CRP - Exchange - Sign Return', 'state_code' => 23],
            ['state_value' => 'Received at warehouse', 'type' => 'All Except Cash Collection', 'state_code' => 24],
            ['state_value' => 'Fulfilled', 'type' => 'Fulfillment', 'state_code' => 25],
            ['state_value' => 'In transit between Hubs', 'type' => 'All Except Cash Collection', 'state_code' => 30],
            ['state_value' => 'Picking up', 'type' => 'Cash Collection', 'state_code' => 40],
            ['state_value' => 'Picked up', 'type' => 'All Except Cash Collection', 'state_code' => 41],
            ['state_value' => 'Pending Customer Signature', 'type' => 'Sign Return', 'state_code' => 42],
            ['state_value' => 'Debriefed Successfully', 'type' => 'Sign Return', 'state_code' => 43],
            ['state_value' => 'Delivered', 'type' => 'Deliver', 'state_code' => 45],
            ['state_value' => 'Returned to business', 'type' => 'Exchange - CRP - Sign Return', 'state_code' => 46],
            ['state_value' => 'Exception', 'type' => 'All', 'state_code' => 47],
            ['state_value' => 'Terminated', 'type' => 'CRP, Cash Collection', 'state_code' => 48],
            ['state_value' => 'Canceled uncovered area', 'type' => 'All', 'state_code' => 49],
            ['state_value' => 'Collection Failed', 'type' => 'Sign Return', 'state_code' => 50],
            ['state_value' => 'Returned to stock', 'type' => 'Fulfillment', 'state_code' => 60],
            ['state_value' => 'Lost', 'type' => 'All',  'state_code' => 100],
            ['state_value' => 'Damaged', 'type' => 'All Except Cash Collection',  'state_code' => 101],
            ['state_value' => 'Investigation', 'type' => 'All',  'state_code' => 102],
            ['state_value' => 'Awaiting your action', 'type' => 'Return Orders',  'state_code' => 103],
            ['state_value' => 'Archived', 'type' => 'All Except Cash Collection',  'state_code' => 104],
            ['state_value' => 'On hold', 'type' => 'All Except Cash Collection',  'state_code' => 105]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_states');
    }
}
