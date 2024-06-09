<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Services\MailService;

class UserRepository implements UserRepositoryInterface 
{
    public function setName() 
    {
        return "setNameFromRepo";
    }
    public function all()
    {
        return User::all();
    }
    public function create(array $data)
    {
        return User::create($data);
    }
    public function update(array $data, $id)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
    public function find($id)
    {
        return User::findOrFail($id);
    }
}