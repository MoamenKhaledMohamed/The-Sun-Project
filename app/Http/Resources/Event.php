<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Donor as DonorResource;

class Event extends JsonResource
{
   /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'start' => $this->start,
            'end' => $this->end,
            'photo' => $this->photo,
            'description' => $this->description,
            'numVolunteer' => $this->donors_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        return $array;
    }

}
