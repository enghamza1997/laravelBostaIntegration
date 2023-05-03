<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Deliveries\Awb;

use BiztechEG\laravelBostaIntegration\Bosta;

class Awb extends Bosta
{
    private $awb;

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * get shipping awb
     *
     * @param string $trackingNumbers
     * @param string $requestedAwbType = 'A4'
     * @param string $lang = 'ar'
     * @return BiztechEG\laravelBostaIntegration\Deliveries\Awb\Awb;
     */
    public function getAwb($trackingNumbers, $requestedAwbType = 'A4', $lang = 'ar')
    {
        $path = 'deliveries/mass-awb';

        $body = new \stdClass();
        $body->trackingNumbers = $trackingNumbers;
        $body->requestedAwbType = $requestedAwbType;
        $body->lang = $lang;

        $this->awb =  $this->send('GET', $path, json_encode($body));
        return $this;
    }

    /**
     * @return $awb - pdf file
     */
    public function pdf()
    {
        $image = base64_decode($this->awb->data);
        return response($image)->header('Content-Type', 'application/pdf;base64');
    }
}
