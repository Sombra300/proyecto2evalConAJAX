<?php

namespace App\Http\Controllers;
use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players=Player::all();

        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $player=new Player();
        $player->name=$request->input('name');
        $player->age=$request->input('age');
        $player->twitter=$request->input('twitter');
        $player->instagram=$request->input('instagram');
        $player->twitch=$request->input('twitch');
        $player->avatar=$request->input('avatar');
        $player->position=$request->input('position');
        $player->visible=$request->input('visible');
        $player->save();
        return redirect()->route('players.show',$player->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player=Player::find($id);
        return view('players.show' , compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player=Player::find($id);
        return view('players.edit', compact('id'), compact('player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $Player)
    {
        $player->name=$request->input('name');
        $player->twitter=$request->input('twitter');
        $player->instagram=$request->input('instagram');
        $player->twitch=$request->input('twitch');
        $player->avatar=$request->input('avatar');
        $player->visible=$request->input('visible');
        return redirect()->route('players.show', $player->id);
        $player->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Player::findOrFail($id)->delete();
       return redirect()->route('players.index');
    }
}
