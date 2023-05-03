<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Deliveries\Fulfillment;

use BiztechEG\laravelBostaIntegration\Bosta;
use BiztechEG\laravelBostaIntegration\Utils\Receiver;
use BiztechEG\laravelBostaIntegration\Utils\DropOffAddress;
use BiztechEG\laravelBostaIntegration\Utils\PickUpAddress;
use Illuminate\Support\Facades\Hash;
use stdClass;

class FulfillmentClient extends Bosta
{
    private stdClass $body;
    private array $webhookArray;
    public function __construct()
    {
        parent::__construct();
        $this->body = new \stdClass();
    }

    /**
     * Create fulfillment order
     *
     * @param string $type
     * @param \BiztechEG\laravelBostaIntegration\Utils\DropOffAddress $dropOffAddress
     * @param \BiztechEG\laravelBostaIntegration\Utils\Receiver $receiver
     * @param string $notes
     * @param array $items - array of items
     * @param stdClass $specs - array of items specs
     * @param int $cod
     * @return \stdClass
     */
    public function create(string $type, array $items, stdClass $specs, PickUpAddress $pickUpAddress, DropOffAddress $dropOffAddress, Receiver $receiver, string $notes, float $cod, string $businessReference)
    {
        $this->updateApiPath(config('bosta.fulfillmentApiPath'));

        $path = 'deliveries/CreateByCsv';
        $data = [];
        $data['deliveries'] = array([
            'type' => $type,
            'specs' => $specs,
            'notes' => $notes,
            'dropOffAddress' => $dropOffAddress,
            'pickUpAddress' => $pickUpAddress,
            'fulfillmentInfo' => [
                'items' => $items
            ],
            'receiver' => $receiver,
            'businessReference' => $businessReference,
            'webhookUrl' => $this->webhookArray['webhookUrl'],
            'webhookCustomHeaders' => $this->webhookArray['webhookCustomHeaders']
        ]);

        return $this->send('POST', $path, $data);
    }

    /**
     * Update Delivery
     *
     * @param string $deliveryId
     * @param \BiztechEG\laravelBostaIntegration\Utils\DropOffAddress $dropOffAddress
     * @param \BiztechEG\laravelBostaIntegration\Utils\Receiver $receiver
     * @param string $notes
     * @param int $cod
     * @return string
     */
    public function update(string $deliveryId, DropOffAddress $dropOffAddress, Receiver $receiver, string $notes, int $cod): string
    {
        $path = 'deliveries/' . $deliveryId;

        $body = new \stdClass();
        $body->notes = $notes;
        $body->receiver = $receiver;
        $body->dropOffAddress = $dropOffAddress;

        if ($cod && $cod != 0) {
            $body->cod = $cod;
        }

        return $this->send('PUT', $path, $body);
    }

    /**
     * terminate Delivery
     *
     * @param string $deliveryId
     * @return void
     */
    public function terminate(string $deliveryId)
    {
        $path = "deliveries/business/$deliveryId/terminate";
        return $this->send('DELETE', $path);
    }

    /**
     * List Deliveries
     *
     * @param int $pageNumber
     * @param int $pageLimit
     * @return \stdClass
     */
    public function list(int $pageNumber = 0, int $pageLimit = 50)
    {
        $path = 'deliveries?pageNumber=' . $pageNumber . '&pageLimit=' . $pageLimit;
        return $this->send('GET', $path);
    }

    /**
     * get Delivery
     *
     * @param string $deliveryId
     * @return 
     */
    public function get(string $deliveryId)
    {
        $path = 'deliveries/' . $deliveryId;
        return $this->send('POST', $path);
    }

    /**
     * @param string $orderId - irder id to be decrypted
     * @param string $hash -order unique identifier to be hashed
     * @return  \BiztechEG\laravelBostaIntegration\Deliveries\Fulfillment\FulfillmentClient
     */
    public function setWebHookUrl(string $orderId, string $hash, string $routeName = 'bostaWebHookRoute')
    {
        // string replace to be removed in real server
        $this->body->webhookUrl = str_replace('http://127.0.0.1:8000','https://hishopper.com',route($routeName, ['token' =>  hash('ripemd160', $orderId)]));
        $this->body->webhookCustomHeaders = [
            "Authorization" => hash('ripemd160', $hash)
        ];

        $this->webhookArray['webhookUrl'] = str_replace('http://127.0.0.1:8000','https://hishopper.com',route($routeName, ['token' =>  hash('ripemd160', $orderId)]));
        $this->webhookArray['webhookCustomHeaders'] = [
            "Authorization" => hash('ripemd160', $hash)
        ];
        return $this;
    }
}
