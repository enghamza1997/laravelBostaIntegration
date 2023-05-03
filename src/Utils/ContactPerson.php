<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration\Utils;

class ContactPerson
{

    public string $firstName;
    public string $lastName;
    public string $phone;
    public string $email;
    public Bool $isDefault;

    /**
     * Create ContactPerson Instance
     *
     * @param string $firstName
     * @param string $phone
     * @param string $email
     */
    public function __construct(string $firstName, string $lastName, string  $phone, string $email, $isDefault = true)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->email = $email;
        $this->isDefault = $isDefault;
    }
}
