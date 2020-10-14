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
        $events = $this->model::withCount('donors')
                                ->where('end', '<', $currentDate)
                                ->orderBy('end', 'asc')
                                ->get();
        return $events;
    }

}
