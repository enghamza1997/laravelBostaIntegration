<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Deliveries;

use BiztechEG\laravelBostaIntegration\Bosta;
use BiztechEG\laravelBostaIntegration\Utils\Receiver;
use BiztechEG\laravelBostaIntegration\Utils\DropOffAddress;
use BiztechEG\laravelBostaIntegration\Utils\PickUpAddress;
use Illuminate\Support\Facades\Hash;
use stdClass;

class DeliveryClient extends Bosta
{
    private stdClass $body;

    public function __construct()
    {
        parent::__construct();
        $this->body = new \stdClass();
    }

    /**
     * Create Delivery
     *
     * @param int $type
     * @param \BiztechEG\laravelBostaIntegration\Utils\DropOffAddress $dropOffAddress
     * @param \BiztechEG\laravelBostaIntegration\Utils\Receiver $receiver
     * @param string $notes
     * @param array $items - array of items
     * @param stdClass $specs - array of items specs
     * @param int $cod
     * @param bool $allowToOpenPackage - Defult false
     * @return \stdClass
     */
    public function create(int $type, stdClass $specs, PickUpAddress $pickUpAddress, DropOffAddress $dropOffAddress, Receiver $receiver, string $notes, float $cod, string $businessReference, $allowToOpenPackage = false): \stdClass
    {
        $path = 'deliveries';

        $this->body->type = $type;
        $this->body->notes = $notes;
        $this->body->specs = $specs;
        $this->body->receiver = $receiver;
        $this->body->pickupAddress = $pickUpAddress;
        $this->body->dropOffAddress = $dropOffAddress;
        $this->body->businessReference = $businessReference;
        $this->body->allowToOpenPackage = $allowToOpenPackage;
        $this->body->cod = $cod;


        return $this->send('POST', $path, $this->body);
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
     * Delete Delivery
     *
     * @param string $deliveryId
     * @return void
     */
    public function delete(string $deliveryId)
    {
        $path = 'deliveries/' . $deliveryId;
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
     * @return  \BiztechEG\laravelBostaIntegration\Deliveries\DeliveryClient
     */
    public function setWebHookUrl(string $orderId, string $hash, string $routeName = 'bostaWebHookRoute')
    {
        // string replace to be removed in real server
        $this->body->webhookUrl =str_replace('http://127.0.0.1:8000','https://hishopper.com',route($routeName, ['token' =>  hash('ripemd160', $orderId)]));
        $this->body->webhookCustomHeaders = [
            "Authorization" =>  hash('ripemd160', $hash)
        ];

        return $this;
    }
}
