<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Like;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::where('recruitement',1)->paginate(8);

        return view('/home/list')->with([
            'items' => $items, 
        ]);
    }

    // // /searchlist/detail/{id}で実行
    public function detail(Request $request){
        $items = Item::find($request->id);
        $like = Like::where('item_id',$request->id)->where('user_id', auth()->user()->id)->first();

        // $nice=Nice::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        // return view('post.show', compact('post', 'nice'));
    //     $keyword = $request->input('keyword');
    //     $page = $request->input('previouspage');
    //     // 商品詳細画面を表示
        
    return view('/home/detail')->with([
            'items' => $items,
            'like' => $like,
        ]);
        
    }

    public function favorite(){
        $user_id = \Auth::id();
        $favorite_id = Like::where('user_id',$user_id)->pluck('item_id');
        
        // echo $favorite_id;
        
        $favorite_items = Item::whereIn('id', $favorite_id)->get();

        return view('/home/favorite')->with([
            'items' => $favorite_items,
        ]);
    }
}
