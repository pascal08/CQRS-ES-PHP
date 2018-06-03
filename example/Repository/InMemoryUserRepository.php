<?php

namespace Example\Repository;

use Example\Entity\User;

class InMemoryUserRepository extends UserRepository
{

    /**
     * @var array
     */
    private $users;

    public function __construct()
    {
        $this->users = [];
    }

    /**
     * @param User $user
     * @return bool
     */
    protected function exists(User $user): bool
    {
        return !array_key_exists($user->getUuid(), array_keys($this->users));
    }

    /**
     * @param User $user
     */
    protected function doAdd(User $user): void
    {
        $this->users[] = $user;
    }

}