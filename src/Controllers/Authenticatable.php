<?php

namespace App\Controllers;

use App\Models\User;

trait Authenticatable
{
    public function attempt(string $email, string $password): ?User
    {
        if ($user = $this->getRepository()->findOneByEmail($email)) {
            if ($this->checkPassword($user, $password)) {
                $_SESSION['logged'] = $user;
                $this->logger->info('User: ' . $_SESSION['logged']->getEmail() . ' logged in.');
                return $user;
            }
        }
        $this->logger->info('Login attempt failed of user: ' . $email . ' .');
        return null;
    }

    public function checkPassword(User $user, string $password)
    {
        return password_verify($password, $user->getPassword());
    }

    public function unsetSession()
    {
        $this->logger->info('User: ' . $_SESSION['logged']->getEmail() . ' logged out.');
        unset($_SESSION['logged']);
    }
}
