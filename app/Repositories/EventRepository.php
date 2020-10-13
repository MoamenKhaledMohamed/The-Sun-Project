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
     * @return events
     */
    public function getEventsCommingSoon() {
        $currentDate =  date("Y-m-d");
        $events = $this->model::where('start', '>', $currentDate)
                                ->orderBy('start', 'asc')
                                ->get();
        return $events;
    }
}
