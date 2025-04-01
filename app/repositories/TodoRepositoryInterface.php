<?php

namespace App\repositories;

interface TodoRepositoryInterface
{
    public function getList($id);

    public function create(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);

    


}
