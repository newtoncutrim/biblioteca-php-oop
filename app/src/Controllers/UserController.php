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
        $users = $this->userService->getUsers();

        if ($users === null) {
            return JsonResponse::send([], 404);
        }

        return JsonResponse::send($users);
    }

    public function show(int $id){
        $user = $this->userService->getUser($id);

        if ($user === null) {
            return JsonResponse::send([], 404);
        }

        return JsonResponse::send($user);
    }
    public function create(Request $request)
    {
        $user = $this->userService->createUser($request->all());

        if ($user === null) {
            return JsonResponse::send([], 404);
        }

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

    public function cadastro()
    {
        require_once __DIR__ . '/../Views/Cadastro.php';
    }
}