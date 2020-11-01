<?php

namespace App\Http\Controllers;


use App\Http\Resources\Donor as DonorResources;
use App\Http\Requests\Donor as DonorRequest;
use App\Repositories\DonorRepository;
use Illuminate\Http\JsonResponse;


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

    public function __construct(DonorRepository $donor)
    {
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


    public function destroy($id)
    {
        $this->donor->delete($id);
        return response()->json([], 200);

    }


    public function update(DonorRequest $request, int $id)
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



    /**
     * @param Request $request
     * @return JsonResponse json
     */

    public function addDonation(DonorRequest $request)
    {

        // validation
        $data = $request->validated();
        // save data in two tables donors and donations

        $donor = $this->donor->addDonorDonation($data);
          if($donor==null)
              // check whether donor exists or not
          {
              // return status code with descriptions
              return response()->json([
              'invalidArgument' =>"The value for email in the request body was invalid."
          ], 400);

          }

        // return data of donor in jason form
        return response()->json([
            'user' => new DonorResources($donor)
        ], 201);
    }

    /**
     * @param Request $request
     * @return JsonResponse json
     */

    public function addDonorAndDonation(DonorRequest $request)
    {
        // validation
        $data = $request->validated();

        // save data in table donations
        $donor = $this->donor->addDonorAndDonation($data);

        // return data of donor in jason form
        return response()->json([
            'user' => new DonorResources($donor)
        ], 201);

    }
}
