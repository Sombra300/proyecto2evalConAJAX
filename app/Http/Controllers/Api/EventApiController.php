<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events=Event::all();

       return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show' , compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        
        $event->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'location'=>$request->input('location'),
            'type'=>$request->input('type'),
            'date'=>$request->input('date'),
            'hour'=>$request->input('hour'),
            'tags'=>$request->input('tags'),
            'visible'=>$request->input('visible'),
        ]);
        return response()->json(['message' => 'Solicitud PUT recibida'], 200);
       // return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
       try{
            $event->delete();
            return response()->json(['mensaje'=>'eliminado'],200);
       }catch(\Exception $e){
        return response()->json(['mensaje'=>'no se ha podido eliminar',500]);
       }
    }
}
