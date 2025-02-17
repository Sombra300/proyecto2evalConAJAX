<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $like=new Like();
        $like->user_id=Auth::user()->id;
        $like->event_id=$request->input('event_id');
        $like->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        Like::findOrFail($id)->delete();
        return redirect()->back();
    }
}
