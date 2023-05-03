<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Districts;

use BiztechEG\laravelBostaIntegration\Bosta;
use PhpParser\Node\Expr\Cast\Double;

class DistrictClient extends Bosta
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * List districts of the City
     *
     * @param string $cityId
     * @return \stdClass
     */
    public function list()
    {
        $path = "cities/getAllDistricts";
        return $this->call($path);
    }

    public function getCityDistrictss($cityId)
    {
        $path = "cities/$cityId/districts";
        return $this->call($path);
    }

    public function getDistrictsByLatAndLng(float $latitude, float $longitude)
    {
        $path = "cities/pinLocation?lat=$latitude&lng=$longitude";
        return $this->call($path);
    }

    /**
     * List Cities
     *
     * @return \stdClass
     */
    private function call($path)
    {
        return $this->send('GET', $path);
    }
}
