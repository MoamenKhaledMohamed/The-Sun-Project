<?php

namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\Needy;

class NeedyRepository extends BaseRepository
{
    //This class extends crud operations
    // Add your logic here

    /**
     * NeedyRepository constructor.
     *
     * @param  Needy
     */
    public function __construct(Needy $needy) {
        parent::__construct($needy);
    }

    /**
     * @param $data
     */
    public function addNeedyAndOutput($data) {
        // separate data  

        // react with image

        // add data into needy table
       $needy = $this->model::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'type' => $data['typeNeedy'],
            'description' => $data['description'],
            'the_cards_photo' => $data['photo']
        ]);

        // use elqouent to insert data into outputs table
        // check type is one or more handle by itself
            for($i = 0; $i < count($data['types']); $i++){
                $d = $data['types'][$i];
                $outputs = $needy->outputs()->create([
                    'type' => $d['type'],
                    'amount' => $d['amount']
                ]);
            }
        dd($needy->id);
        return $needy;        
        // return this needy
    }
}
