<?php

namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\Needy;

class NeedyRepository extends BaseRepository
{
    /**
     * /NeedyRepository constructor.
     *
     * @param  Needy
     */
    public function __construct(Needy $needy) {
        parent::__construct($needy);
    }
   //This class extends crud operations
    // Add your logic here
    /**
     * @return new needy
     */
}
