<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Utils;

class Item
{
    public string $bostaSKU;
    public int $quantity;
    public float $itemPrice;

    /**
     * Create DropOffItem Instance
     *
     * @param string $districtId
     * @param string $firstLine
   
     */
    public function __construct(string $bostaSKU,  int $quantity, float $itemPrice)
    {
        $this->bostaSKU = $bostaSKU;
        $this->quantity = $quantity;
        $this->itemPrice = $itemPrice;
    }
}
