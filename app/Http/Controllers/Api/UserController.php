<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Validators;

class UserController extends Controller
{
    public function get(){
        return ;
    }
    public function login(){
        return ;
    }
    public function create (Request $request){

        // $validate = $request->validate([
        //     "name" => "required",
        //     "email" => "required",
        //     "password" => "required",
        // ]);

        return response()->json(["name" => "dadad"]);

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->paasword = Hash::make($request->password);

        // return json_encode( $user);
    }
    public function update(){
        return ;
    }
    public function updatePass(){
        return ;
    }
    public function delete($id){
        return ;
    }
}
