<?php

namespace App\services;

use App\repositories\TodoRepositoryInterface;

class TodoServices
{
    /**
     * Create a new class instance.
     */
    public function __construct(public TodoRepositoryInterface $todoRepository)
    {
        
    }
    
    public function getList($id)
    {

        return $this->todoRepository->getList($id);

    }

    public function create(array $data)
    {
        return $this->todoRepository->create($data);

    }


    public function update(array $data, int $id)
    {
        return $this->todoRepository->update($data, $id);

    }

    
    public function delete(int $id)
    {
        return $this->todoRepository->delete($id);

    }
}
