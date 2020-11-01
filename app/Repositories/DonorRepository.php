<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Donor;
use function PHPUnit\Framework\isEmpty;

class DonorRepository extends BaseRepository
{
    //This class extends crud operations
    // Add your logic here

    /**
     * UserRepository constructor.
     *
     * @param Donor
     */
    public function __construct(Donor $donor)
    {
        parent::__construct($donor);
    }

    public function addDonation($data,$model) {
//add donation data
//check if has 1 or many donations
        for($i = 0; $i < count($data['types']); $i++){
            $d = $data['types'][$i];

            $model->donations()->create([
                'type' => $d['type'],
                'amount' => $d['amount']
            ]);
        }
    }


    public function addDonorAndDonation($data) {
        // add data into donor table
        $donor = $this->model::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);

        // use elqouent to insert data into outputs table
        //
        $this->addDonation($data,$donor);

        return $donor;
        // return this donor
    }




    public function addDonorDonation($data)
    {
        //check if donor,s email is in databese or not
        $mail = $this->model::where('email', $data['email'])->first();
if($mail==null) {
   return $mail;
    }


else {
    //call method to add the donation
    $this->addDonation($data,$mail);

    }
//return donation
        return $mail;
}



}
