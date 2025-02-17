<?php

namespace App\Http\Controllers;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events=Event::all();

       return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event=new Event();
        $event->name=$request->input('name');
        $event->description=$request->input('description');
        $event->date=$request->input('date');
        $event->hour=$request->input('hour');
        $event->type=$request->input('type');
        $event->tags=$request->input('tags');
        $event->visible=$request->input('visible');
        $event->save();
        return redirect()->route('events.show', $event->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event=Event::find($id);
        return view('events.show' , compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event=Event::find($id);
        return view('events.edit', compact('id'), compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $Event)
    {
        $event->name=$request->input('name');
        $event->description=$request->input('description');
        $event->date=$request->input('date');
        $event->hour=$request->input('hour');
        $event->type=$request->input('type');
        $event->tags=$request->input('tags');
        $event->visible=$request->input('visible');
        $event->save();
        return redirect()->route('events.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::findOrFail($id)->delete();
       return redirect()->route('events.index');
    }
}
