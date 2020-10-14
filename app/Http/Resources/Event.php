<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Donor as DonorResource;
use App\Models\Event as EventModel;

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
            'numVolunteer' => $this->getNumVolunteer($this->id),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        return $array;
    }

    /**
     * @param id
     * @return number of volunteer
     */
    public function getNumVolunteer ($id){
        $event = EventModel::find($id);
        $num = $event->donors->count();
        return $num;
    }    
}
