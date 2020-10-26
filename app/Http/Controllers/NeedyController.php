<?php

namespace App\Http\Controllers;


use App\Http\Resources\Needy as NeedyResources;
use App\Repositories\NeedyRepository;
use App\Http\Requests\Needy as NeedyRequest;

class NeedyController extends Controller
{
    /**
     * @var Needy
     */
    protected $needy;

    /**
     * UserController constructor.
     *
     * @param NeedyRepository
     */

    public function __construct(NeedyRepository $needy){
        $this->needy = $needy;
    }

    public function store(NeedyRequest $request)
    {
        $data = $request->validated();

        $needy = $this->needy->create($data);

        return response()->json([
            'user' => new NeedyResources($needy)
        ], 201);
    }


    public function destroy($id){
        $this->needy->delete($id);
        return response()->json([], 200);

    }


    public function update(NeedyRequest $request, int $id)
    {

        $data = $request->validated();

        $needy = $this->needy->update($id, $data);

        return response()->json([
            'user' => new NeedyResources($needy)
        ], 201);
    }


    public function search(string $data)
    {
        $needy = $this->needy->getResult($data);
        return response()->json([
            'user' => NeedyResources::collection($needy)
        ], 200);
    }

    /**
     * @param Request $request
     * @return Response json
     */
    public function addNeedyAndOutput(NeedyRequest $request){

        // validation
        $data = $request->validated();
        // save data in two tables needy and outputs 
        $needy = $this->needy->addNeedyAndOutput($data);
        return $needy;
        // change public array 
        // return json

    }

}
