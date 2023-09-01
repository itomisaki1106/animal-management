<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

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
        $items = Item::all();
        return view('/home/list')->with([
            'items' => $items, 
        ]);
    }

    // // /searchlist/detail/{id}で実行
    public function detail(Request $request){
        $items = Item::find($request->id);
    //     $keyword = $request->input('keyword');
    //     $page = $request->input('previouspage');
    //     // 商品詳細画面を表示
        return view('/home/detail')->with([
            'items' => $items,
        ]);
        
    }
}
