<?php

namespace App\Contracts;



interface UserRepositoryInterface
{

    public function all();
    public function findById($id);
    public function create(array $data);
    public function update($model, array $data);
    public function delete($model);
}
