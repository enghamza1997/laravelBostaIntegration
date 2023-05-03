<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Utils;

class Receiver
{
    public string $firstName;
    public string $lastName;
    public string $phone;
    public string $secondPhone;
    public $email;
    /**
     * Create Receiver Instance
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     */
    public function __construct(string $firstName, string $lastName, string $phone, string $secondPhone = '', string $email = 'demo@hishopper.com')
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->secondPhone = $secondPhone;
        $this->email = $email;
    }
}
