<?php

use BiztechEG\laravelBostaIntegration\Models\ExceptionReason;
use Illuminate\Database\Seeder;

class ExceptionReasonsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ExceptionReason::insert(
            [
                ['reason' => 'Retry delivery - the customer is not in the address', 'code' => 1],
                ['reason' => 'Retry delivery - the customer changed the address.', 'code' => 2],
                ['reason' => 'Postponed - the customer requested postponement for another day.', 'code' => 3],
                ['reason' => 'Cancellation - the customer wants to open the shipment.', 'code' => 4],
                ['reason' => 'Waiting for data modification - address or phone number not clear/wrong.', 'code' => 5],
                ['reason' => 'Cancellation - cancellation of delivery at the request of the sender.', 'code' => 6],
                ['reason' => 'Customer is not answering.', 'code' => 7],
                ['reason' => 'Cancellation - the customer refuses to receive the shipment.', 'code' => 8],
                ['reason' => 'Cancellation - the delivery address is outside bosta coverage area.', 'code' => 12],
                ['reason' => 'Waiting for data modification - address not clear.', 'code' => 13],
                ['reason' => 'Waiting for data modification - wrong phone number.', 'code' => 14],
                ['reason' => 'Bad Weather.', 'code' => 100],
                ['reason' => 'Suspicious consignee.', 'code' => 101],
                ['reason' => 'Retry return - Business changed the address.', 'code' => 20],
                ['reason' => 'Postponed - Business requested postponement for another day.', 'code' => 21],
                ['reason' => 'Waiting for data modification: address or phone number not clear/wrong.', 'code' => 22],
                ['reason' => 'Business is not answering.', 'code' => 23],
                ['reason' => 'Business refused to receive the shipment.', 'code' => 24],
                ['reason' => 'Retry return - Business is not in the address.', 'code' => 25],
                ['reason' => 'Bad Weather.', 'code' => 100],
                ['reason' => 'Suspicious consignee.', 'code' => 101],
                ['reason' => 'The order is damaged.', 'code' => 26],
                ['reason' => 'Empty order.', 'code' => 27],
                ['reason' => 'The order is incomplete.', 'code' => 28],
                ['reason' => 'The order does not belong the business.', 'code' => 29],
                ['reason' => 'The order was opened while it should not.', 'code' => 30],
            ]
        );
    }
}
