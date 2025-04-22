<?php

namespace App\Services;

use App\Repository\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {}

    public function getUsers(){
        return $this->userRepository->all();
    }

    public function getUser(int $id){
        return $this->userRepository->find($id);
    }
    public function createUser(array $data){
        return $this->userRepository->create($data);
    }

    public function updateUser(array $data, int $id){
        return $this->userRepository->update($data, $id);
    }

    public function deleteUser(int $id)
    {
        return $this->userRepository->delete($id);
    }
}