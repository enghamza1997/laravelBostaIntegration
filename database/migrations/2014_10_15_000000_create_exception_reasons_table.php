<?php

use BiztechEG\laravelBostaIntegration\Models\ExceptionReason;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExceptionReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exception_reasons', function (Blueprint $table) {
            $table->bigInteger('reason_code')->primary()->unsigned();
            $table->string('reason_name');
        });

        ExceptionReason::insert(
            [
                ['reason_name' => 'Retry delivery - the customer is not in the address', 'reason_code' => 1],
                ['reason_name' => 'Retry delivery - the customer changed the address.', 'reason_code' => 2],
                ['reason_name' => 'Postponed - the customer requested postponement for another day.', 'reason_code' => 3],
                ['reason_name' => 'Cancellation - the customer wants to open the shipment.', 'reason_code' => 4],
                ['reason_name' => 'Waiting for data modification - address or phone number not clear/wrong.', 'reason_code' => 5],
                ['reason_name' => 'Cancellation - cancellation of delivery at the request of the sender.', 'reason_code' => 6],
                ['reason_name' => 'Customer is not answering.', 'reason_code' => 7],
                ['reason_name' => 'Cancellation - the customer refuses to receive the shipment.', 'reason_code' => 8],
                ['reason_name' => 'Cancellation - the delivery address is outside bosta coverage area.', 'reason_code' => 12],
                ['reason_name' => 'Waiting for data modification - address not clear.', 'reason_code' => 13],
                ['reason_name' => 'Waiting for data modification - wrong phone number.', 'reason_code' => 14],
                ['reason_name' => 'Bad Weather.', 'reason_code' => 100],
                ['reason_name' => 'Suspicious consignee.', 'reason_code' => 101],
                ['reason_name' => 'Retry return - Business changed the address.', 'reason_code' => 20],
                ['reason_name' => 'Postponed - Business requested postponement for another day.', 'reason_code' => 21],
                ['reason_name' => 'Waiting for data modification: address or phone number not clear/wrong.', 'reason_code' => 22],
                ['reason_name' => 'Business is not answering.', 'reason_code' => 23],
                ['reason_name' => 'Business refused to receive the shipment.', 'reason_code' => 24],
                ['reason_name' => 'Retry return - Business is not in the address.', 'reason_code' => 25],
                ['reason_name' => 'The order is damaged.', 'reason_code' => 26],
                ['reason_name' => 'Empty order.', 'reason_code' => 27],
                ['reason_name' => 'The order is incomplete.', 'reason_code' => 28],
                ['reason_name' => 'The order does not belong the business.', 'reason_code' => 29],
                ['reason_name' => 'The order was opened while it should not.', 'reason_code' => 30],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exception_reasons');
    }
}
