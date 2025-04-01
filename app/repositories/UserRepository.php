<?php

namespace App\repositories;
use App\Models\User;
use function Pest\Laravel\json;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(private User $model)
    {
        
    }

    public function register(array $data)
    {
        $user = $this->model->create($data);
        $success['token']=$user->createToken('MyApp')->plainTextToken;
        return response()->json(['success' => true, 'data' => $success, 'message' => 'User registered successfully']);



    }

    public function login(array $data)
    {
        $user= User::where('email', $data['email'])->first();
        if(!$user || !\Hash::check($data['password'], $user->password)){
            return response()->json(['success' => false, 'message' => 'Invalid credentials']);
        }

        $success['token']= $user->createToken('MyApp')->plainTextToken;
        $success['name']= $user->name;
        return response()->json(['success' => true, 'data' => $success, 'message' => 'User logged in successfully']);
        

    }
}
