<?php

namespace App\Repository;

use App\Models\Model;
use Database\Database;

abstract class Repository
{
    use Properties;
    use SqlBuilders;

    protected $db;

    public function __construct()
    {
        // $this->model = $model;
        $this->db = new Database;
    }

    public function find($id): ?Model
    {
        // return $this->model;
    }


    public function destroy(Model $model): bool
    {
        // return true;
    }
}
