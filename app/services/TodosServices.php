<?php

namespace App\services;

use App\repositories\TodosRepositoryInterface;

class TodosServices
{
    /**
     * Create a new class instance. 
     */
    public function __construct(public TodosRepositoryInterface $todoRepository)
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
