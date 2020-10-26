<?php

namespace App\Http\Controllers;


use App\Http\Resources\Donor as DonorResources;
use Illuminate\Http\DonorRequest;
use App\Repositories\DonorRepository;


class DonorController extends Controller
{
    /**
     * @var Donor
     */
    protected $donor;

    /**
     * UserController constructor.
     *
     * @param DonorRepository
     */

    public function __construct(DonorRepository $donor){
        $this->donor = $donor;
    }

    public function store(DonorRequest $request)
    {
        $data = $request->validated();

        $donor = $this->donor->create($data);

        return response()->json([
            'user' => new DonorResources($donor)
        ], 201);
    }


    public function destroy($id){
        $this->donor->delete($id);
        return response()->json([], 200);

    }


    public function update(NeedyRequest $request, int $id)
    {

        $data = $request->validated();

        $donor = $this->donor->update($id, $data);

        return response()->json([
            'user' => new DonorResources($donor)
        ], 201);
    }


    public function search(string $data)
    {
        $donor = $this->donor->getResult($data);
        return response()->json([
            'user' => DonorResources::collection($donor)
        ], 200);
    }

}

