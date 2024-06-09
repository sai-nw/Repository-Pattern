<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface 
{
    public function all() 
    {
        return User::all();
    }

    public function find($id) 
    {
        User::where('id',$id)->delete();
    }

    public function delete($id) 
    {
        User::where('id',$id)->delete();
    }

    public function create(array $attributes) 
    {
        return User::create($attributes);
    }

    public function update($attributes, $id) 
    {
        return  User::where('id',$id)->update($attributes);
    }
}