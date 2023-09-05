<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Like;

class LikeController extends Controller
{
    //
    public function like(Request $request){
        
        
        $like = New Like();
        $like->item_id = $request->id;
        $like->user_id = \Auth::id();
        $like->save();

        return redirect('/home/list');

    }

    public function unlike(Request $request){
        $user=\Auth::id();
        $like=Like::where('item_id', $request->id)->where('user_id', $user)->first();
        $like->delete();

        return redirect('/home/list');
    }
}
