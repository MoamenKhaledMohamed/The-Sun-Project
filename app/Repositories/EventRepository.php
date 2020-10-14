<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Event;

class EventRepository extends BaseRepository{

    /**      
     * EventRepository constructor.      
     *      
     * @param  Event     
     */   
    public function __construct(Event $event) {
        parent::__construct($event);
    }

    /**
     * @return new events
     */
    public function getEventsCommingSoon() {
        $currentDate =  date("Y-m-d");
        $events = $this->model::where('start', '>', $currentDate)
                                ->orderBy('start', 'asc')
                                ->get();
        return $events;
    }

    /**
     * @return old events
     */
    public function getOldEvents() {
        $currentDate =  date("Y-m-d");
        $events = $this->model::where('end', '<', $currentDate)
                                ->orderBy('end', 'asc')
                                ->get();
        return $events;
    }

    /**
     * @param id this mehtod doesn't use yet
     * @return number of volunteer
     */
    public function getNumVolunteer($id){
        $event = $this->model::find($id);
        $num = $event->donors->count();
        return $num;
    }
}
