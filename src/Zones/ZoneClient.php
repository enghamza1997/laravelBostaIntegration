<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Zones;

use BiztechEG\laravelBostaIntegration\Bosta;

class ZoneClient extends Bosta
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * List Zones of the City
     *
     * @param string $cityId
     * @return \stdClass
     */
    public function list(string $cityId)
    {
        $path = "cities/$cityId/zones";
        return $this->send('GET', $path);
    }
}
