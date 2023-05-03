<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Utils;

class PickUpAddress
{
    public string $city;
    public string $firstLine;
    public Int $buildingNumber;
    public string $zone;
    public string $district;
    public string $secondLine;
    public string $floor;
    public string $apartment;
    public bool $isWorkAddress;

    /**
     * Create DropOffAddress Instance
     *
     *@param string $city;
     *@param string $firstLine;
     *@param Int $buildingNumber;
     *@param string $zone;
     *@param string $district;
     *@param string $secondLine;
     *@param string $floor;
     *@param string $apartment;
     *@param bool $isWorkAddress;
     *@return void
     */

    public function __construct(string $city, string $firstLine, string $district = '', Int $buildingNumber = 0, string $zone  = '', string $secondLine  = '', string $floor  = '', string $apartment  = '', bool $isWorkAddress = false)
    {
        $this->city = $city;
        $this->firstLine = $firstLine;
        $this->buildingNumber = $buildingNumber;
        $this->zone = $zone;
        $this->district = $district;
        $this->secondLine = $secondLine;
        $this->floor = $floor;
        $this->apartment = $apartment;
        $this->isWorkAddress = $isWorkAddress;
    }
}
