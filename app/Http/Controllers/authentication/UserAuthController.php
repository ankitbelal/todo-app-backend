<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationRequest;
use App\repositories\UserRepositoryInterface;
use App\services\UserServices;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class UserAuthController extends Controller

{

    public function __construct(public UserServices $userServices)
    {
        

    }
    public function login(Request $request)
    {
        $data= request()->all();
        
       return $this->userServices->login($data);



        
    }

    public function register(UserRegistrationRequest $request)
    {
        $data= request()->all();
     return  $this->userServices->register($data);
      
      

    }
}
