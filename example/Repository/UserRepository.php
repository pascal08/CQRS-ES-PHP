<?php

namespace Example\Repository;

use Example\Entity\User;

abstract class UserRepository implements UserRepositoryInterface
{

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @return User
     */
    public function create(string $username, string $email, string $password): User
    {
        return new User($username, $email, $password);
    }

    /**
     * @param User $user
     */
    public function add(User $user)
    {
        if($this->exists($user)) {
            $this->doAdd($user);
        }
    }

    /**
     * @param User $user
     * @return bool
     */
    abstract protected function exists(User $user): bool;

    /**
     * @param User $user
     * @return mixed
     */
    abstract protected function doAdd(User $user): void;

}