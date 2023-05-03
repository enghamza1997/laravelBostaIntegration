<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\PickupLocations;

use BiztechEG\laravelBostaIntegration\Bosta;
use BiztechEG\laravelBostaIntegration\Utils\PickUpAddress;
use BiztechEG\laravelBostaIntegration\Utils\ContactPerson;

class PickupLocationClient extends Bosta
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * List PickupLocations
     *
     * @return \stdClass
     */
    public function list(): \stdClass
    {
        $path = 'pickup-locations';
        $response = $this->send('GET', $path, new \stdClass, '');

        if ($response->success === true) {
            return $response->data;
        } elseif ($response->success === false) {
            throw new \Exception($response->message);
        }
    }

    public function create(string $locationName, ContactPerson $contactPerson, PickUpAddress $address)
    {
        $path = 'pickup-locations';
        $body = new \stdClass;

        $body->locationName = $locationName;
        $body->contacts[0] = $contactPerson;
        $body->address = $address;

        return $this->send('POST', $path, json_encode($body));
    }
}
