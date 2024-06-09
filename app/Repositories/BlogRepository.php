<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface 
{
    public function getAllUsers() 
    {

        // MailService::phpMailer("aung@gmail.com", "otp", "Otp for verificaton");

        return User::all();
    }

    public function getUserById(User $user) 
    {
        return $user;
    }

    public function deleteUser(User $user) 
    {
        $user->delete();
    }

    public function createUser(array $attributes) 
    {
        return User::create($attributes);
    }

    public function updateUser(User $user, array $attributes) 
    {
        return $user->update($attributes);
    }
}