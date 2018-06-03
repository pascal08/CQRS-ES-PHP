<?php

namespace Example\Event;

use Example\Entity\User;
use Symfony\Component\EventDispatcher\Event;

class RegisterUserCompletedEvent extends Event
{

    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

}