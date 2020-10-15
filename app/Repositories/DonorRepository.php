<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Donor;

class DonorRepository extends BaseRepository
{
    //This class extends crud operations
    // Add your logic here

    /**
     * UserRepository constructor.
     *
     * @param Donor
     */
    public function __construct(Donor $donor) {
        parent::__construct($donor);
    }
}
