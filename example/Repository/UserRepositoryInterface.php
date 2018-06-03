<?php

namespace Example\Repository;

use Example\Entity\User;

interface UserRepositoryInterface
{

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @return User
     */
    public function create(string $username, string $email, string $password): User;

    /**
     * @param User $user
     * @return mixed
     */
    public function add(User $user);

}