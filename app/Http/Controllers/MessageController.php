<?php

namespace App\Http\Controllers;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages=Message::orderBy('created_at', 'desc')->get();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message=new Message();
        $message->name=Auth::user()->name;
        $message->subject=$request->input('subject');
        $message->text=$request->input('text');
        $message->readed=0;
        $message->created_at=date('Y-m-d H:i:s');
        $message->updated_at=date('Y-m-d H:i:s');
        $message->save();
        return redirect()->route('messages.show', $message->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message=Message::find($id);
        return view('messages.show' , compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $Message)
    {
        $message->readed=1;
        $message->updated_at=date('Y-m-d H:i:s');
        $message->save();
        return redirect()->route('messages.show', $message->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Message::findOrFail($id)->delete();
       return redirect()->route('events.index');
    }
}
