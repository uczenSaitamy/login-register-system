<?php

namespace App\Repository;

use App\Models\User;
use ReflectionClass;
use ReflectionProperty;
use App\Models\Model;

class UserRepository extends Repository
{
    public $table = 'USERS';

    public function save(User $user): ?User
    {
        $prop = $this->getProperties($user);
        $pdo = $this->db->connect();
        try {
            $pdo->beginTransaction();

            if ($stmt = $pdo->prepare($this->getInsert($prop))) {
                if ($stmt->execute($this->getData($prop, $user))) {
                    $pdo->commit();
                    return $user;
                }
            }
        } catch (\Throwable $th) {
            /**
             * TODO LOGS
             */
            echo $th->getMessage();
        }
        $pdo->rollback();
        return null;
    }
}
