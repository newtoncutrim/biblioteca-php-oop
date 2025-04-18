<?php

namespace App\Repository;

use App\Model\User;

class UserRepository extends AbstractRepository implements InterfaceRepository
{
    public function all(): array
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, User::class);
    }
}