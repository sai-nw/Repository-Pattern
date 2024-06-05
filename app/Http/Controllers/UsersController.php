<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function __construct(
        private UserRepositoryInterface $repository
     ) 
     {
     }
 
     public function index(): JsonResponse 
     {
         return response()->json([
             'data' => $this->repository->getAllUsers()
         ]);
     }
 
     public function store(Request $request): JsonResponse 
     {
         $attributes = $request->only([
             'username',
             'email'
         ]);
 
 
         return response()->json(
             [
                 'data' =>  $this->repository->createUser(
                    array_merge($attributes, ['password' => Hash::make($request->input('password'))]),
                    Response::HTTP_CREATED
                )
            ]);
     }
 
     public function show(User $user): JsonResponse 
     {
 
         return response()->json([
             'data' => $user
         ]);
     }
 
     public function update(User $user, Request $request): JsonResponse 
     {
         $attributes = $request->only([
             'username',
             'email'
         ]);
 
         return response()->json([
             'data' => $this->repository->updateUser($user, $attributes)
         ]);
     }
 
     public function destroy(User $user): JsonResponse 
     {
 
         $this->repository->deleteUser($user);
 
         return response()->json(null, Response::HTTP_NO_CONTENT);
     }
}
