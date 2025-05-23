<?php

namespace App\Http\Controllers\todos;
use App\Http\Controllers\Controller;

use App\Models\Todos;
use App\services\TodosServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function __construct(public TodosServices $todoServices)
    {

    }
    public function index()
    {
        return $this->todoServices->getList(Auth::id());


    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request['user_id'] = Auth::id();

        return $this->todoServices->create($request->all());
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request['user_id'] = Auth::id();
       return $this -> todoServices -> update($request->all(), $request->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $request['user_id'] = Auth::id();
    {
       return $this -> todoServices -> delete($id);
    }



}
}
