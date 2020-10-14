<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResources;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Resources\UserCollection;
use App\Http\Requests\Auth as UserRequest;
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
        return response()->json([
            'data'  => UserResources::collection($rows)
        ], 200);
    }


    public function show(int $id)
    {
        $user = $this->user->getuser($id);
        return response()->json([
            'user'  => new UserResources($user),
        ], 200);
    }



    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $user = $this->user->create($data);

        return response()->json([
            'user' => new UserResources($user)
        ], 201);
    }


    public function destroy($id){
        $this->user->delete($id);
        return response()->json([], 200);

    }


    public function update(UserRequest $request, int $id)
    {

        $data = $request->validated();

        $user = $this->user->update($id, $data);

        return response()->json([
            'user' => new UserResources($user)
        ], 201);
    }


    public function search(string $data)
    {
        $user = $this->user->getResult($data);
        return response()->json([
            'user' => UserResources::collection($user)
        ], 200);
    }

}
