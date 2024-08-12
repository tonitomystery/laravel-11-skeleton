<?php

namespace App\Repositories;


class BaseRepository
{
    protected $model;
    public function findById($id)
    {
        return $this->model::findOrFail($id);
    }
    public function all()
    {
        return $this->model;
    }
    public function create(array $data)
    {
        return $this->model::create($data);
    }
    public function update($model, array $data)
    {
        $model->update($data);
        return $model;
    }
    public function delete($model)
    {
        $model->delete();
    }
}
