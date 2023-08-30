<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
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
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();
        //dd(config('auth.type.1')); 
        //$value config()
        //$value = config('app.timezone');
        return view('item.index')->with([
            'items' => $items,
        ]);
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'gender' => 1,
                'healthCondition' => 2,
                'recruitement'=> 3,
                'detail' => $request->detail,
                'image' => null,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }
}
