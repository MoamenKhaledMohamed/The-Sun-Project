<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{   
    /**
     * @var user
     */
    protected $user;
    
    /**      
     * UserController constructor.      
     *      
     * @param UserRepository
     */   
    public function __construct(UserRepository $user){
        $this->user = $user;
    }

    public function index(){
       $rows = $this->user->read();
       return new UserCollection($rows);
    }

    public function destroy($id){
        $this->user->delete($id);
    }
   

}
