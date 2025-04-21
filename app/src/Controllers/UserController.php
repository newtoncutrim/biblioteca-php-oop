<?php

namespace App\Controllers;

use App\HTTP\JsonResponse;
use App\HTTP\Request;
use App\Services\UserService;

class UserController
{
    public function __construct(private UserService $userService)
    {
        
    }
    public function index()
    {
       return $this->userService->getUsers();
    }

    public function create(Request $request)
    {
        $user = $this->userService->createUser($request->all());

        return JsonResponse::send($user, 201);
    }
    
    public function update(Request $request, int $id)
    {
        return $this->userService->updateUser($request->all(), $id);
    }

    public function delete(int $id)
    {
        return $this->userService->deleteUser($id);
    }
}