<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository {
    //This class extends crud operations 
    // Add your logic here

     /**      
     * UserRepository constructor.      
     *      
     * @param User      
     */   
    public function __construct(User $user) {
        parent::__construct($user);
    }
}