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
                'gender' => $request->gender,
                'healthCondition' => $request->health,
                'recruitement'=> $request->health,
                'detail' => $request->detail,
                'image' => null,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }
    
    public function edit(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            $item = Item::find($request->id);
            
            
            $item->user_id = \Auth::id();
            $item->name = $request->name;
            $item->type = $request->type;
            $item->gender = $request->gender;
            $item->healthCondition = $request->health;
            $item->recruitement = $request->recruite;
            $item->detail = $request->detail;
            $item->image = null;
            $item->save();
            
            return redirect('/items');
        }

        
        $id = $request->id;
        $user_id = \Auth::user()->name;

        $items = \DB::table('items')->find($id);
        // $items = Item::find($id);
        
        return view('/item/edit')->with([
            'items' => $items,
            // 'user_id' => $user_id
            'test' => $id,
        ]);    
        
    }
}
