<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\UserService;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
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
     public function store(Request $request)
     {
        $data = $request->validate([
             'name' => 'required',
             'email' => 'required|unique:users,email',
             'password' => 'required|confirmed'
         ]);
 
        $user = $this->userService->create($data);
 
        return redirect()->route('users.show', $user->id);
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
