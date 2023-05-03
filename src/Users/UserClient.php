<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Users;

use BiztechEG\laravelBostaIntegration\Bosta;

class UserClient extends Bosta
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getUser()
    {
        $path = 'users/fullData';
        return $this->send('GET', $path);
    }
}
