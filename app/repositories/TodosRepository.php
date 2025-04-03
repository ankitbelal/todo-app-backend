<?php

namespace App\repositories;
use App\Models\Todos;
use App\Models\User;

class TodosRepository implements TodosRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(public Todos $todosmodel, public User $usermodel)
    {
        
    }

    public function getList($id)
    {
        $list= $this->usermodel->find($id)->todos;

        return response()->json($list);

        
    }

    public function create(array $data)
    {
       $created= $this->todosmodel->create($data);
       return response()->json(['success' => true, 'data' => $created, 'message' => 'Task created successfully']);
    
    }


    public function update(array $data, int $id)
    {
        $updated= $this->todosmodel->find($id)->update($data);
        return response()->json(['success' => true, 'data' => $updated, 'message' => 'Task updated successfully']);
    }


    public function delete(int $id)
    {
        $deleted= $this->todosmodel->find($id)->delete();
        return response()->json(['success' => true, 'data' => $deleted, 'message' => 'Task deleted successfully']);
    }
}
