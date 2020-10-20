<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use App\Http\Resources\Event as EventResource;
use App\Models\Event;
use Illuminate\Http\EventRequest;

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

    public function store(EventRequest $request)
    {
        $data = $request->validated();

        $events = $this->event->create($data);

        return response()->json([
            'user' => new EventResource($events)
        ], 201);
    }


    public function destroy($id){
        $this->event->delete($id);
        return response()->json([], 200);

    }


    public function update(EventRequest $request, int $id)
    {

        $data = $request->validated();

        $events = $this->event->update($id, $data);

        return response()->json([
            'user' => new EventResource($events)
        ], 201);
    }


    public function search(string $data)
    {
        $events = $this->event->getResult($data);
        return response()->json([
            'user' => EventResource::collection($events)
        ], 200);
    }

}
