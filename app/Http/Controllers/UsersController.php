<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserRequest;

class UsersController extends Controller
{
    public function __construct( protected UserService $userService) 
     {

     }
   
     public function index()
     {
        return $this->userService->all();
     }
     public function create()
     {
        return view('users.create');
     }
     public function store(AddUserRequest $request)
     {
 
       $this->userService->create($request->all());
 
     }
     public function show($id)
     {
         return $this->userService->find($id);
     }
     public function edit($id)
     {
         return $this->userService->find($id);
     }
     public function update(Request $request, $id)
     {
         $data = $request->validate([
             'name' => 'required',
             'email' => 'required|unique:users,email,'.$id,
             'password' => 'sometimes|confirmed'
         ]);
 
        return $this->userService->update($data, $id);
     }
 
     public function destroy($id)
     {
        return $this->userService->delete($id);
     }
}
