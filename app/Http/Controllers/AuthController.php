<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth as AuthorizesRequests;
class AuthController extends Controller
{
  public function register (AuthorizesRequests $request){
      $data = $request->validated();
      //this method to incrypt password
      $data['password']=bcrypt($request->password);
      //insert data to user table
$user =User::create($data);
//generate register access token
$accessToken=$user->createToken('authToken')->accessToken;
//return response with user data and access token(can be edited later)
return response(['user'=>$user,'access_token'=>$accessToken]);
  }

    public function login (AuthorizesRequests $request){
        $data = $request->validated();
        //if failed to login(email or password wrong)
        if(!auth()->attempt($data)){
       return response(['message'=>'invailed mail or password']);}
//generate login access token
            $accessToken=auth()->user()->createToken('authToken')->accessToken;
        //return response with user data and access token(can be edited later)
        return response(['user'=>auth()->user(),'access_token'=>$accessToken]);

    }


}
