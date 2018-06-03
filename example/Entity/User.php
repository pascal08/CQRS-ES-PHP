<?php

namespace Example\Entity;

class User
{

    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    public function __construct(string $username, string $email, string $password)
    {
        $this->uuid = uniqid();
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

}