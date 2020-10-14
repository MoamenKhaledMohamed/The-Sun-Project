<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use App\Http\Resources\Event as EventResource;
use App\Models\Event;
class EventController extends Controller
{
    /**
     * @var event
     */
    protected $event;
    
    /**      
     * EventController constructor.      
     *      
     * @param EventRepository
     */   
    public function __construct(EventRepository $event){
        $this->event = $event;
    }
    
    /**
     * @return all events json or not found
     */
    public function getEventsCommingSoon() {
        $events = $this->event->getEventsCommingSoon();
        if($events->isEmpty()){
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json(['data' => $events], 200);
    }

    /**
     * @return old events json or null
     */
    public function getOldEvents() {
        $events = $this->event->getOldEvents();
        if($events->isEmpty()){
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json(
            ['data' => EventResource::collection($events)]
            , 200);
    }
}
