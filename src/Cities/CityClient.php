<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Cities;

use BiztechEG\laravelBostaIntegration\Bosta;

class CityClient extends Bosta
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $path = 'cities';
        return $this->call($path);
    }

    public function getCityById(string $cityId)
    {
        $path = "cities/{$cityId}";
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
