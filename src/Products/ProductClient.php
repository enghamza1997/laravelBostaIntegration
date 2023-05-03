<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Products;

use BiztechEG\laravelBostaIntegration\Bosta;

class ProductClient extends Bosta
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function list()
    {
        $path = 'fulfillment/products/list';
        return $this->send('POST', $path);
    }
}
