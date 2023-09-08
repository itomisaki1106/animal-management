<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Like;

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
        $items = Item::withcount('likes')->get();
        // $items = Item::all(); bladeでitem->likes->count()でも同様の結果
        
        // dd($items);
        //$like_count = Like::where('item_id',)
        //
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
            if(isset($request->image)){
                $image = base64_encode(file_get_contents($request->image->getRealPath()));
            }else{
                $image =null;
            }

            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'gender' => $request->gender,
                'age' => $request->age,
                'healthCondition' => $request->health,
                'recruitement'=> $request->health,
                'detail' => $request->detail,
                'image' => $image,
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

            // 商品更新
            $item = Item::find($request->id);
            // $type = Item::TYPE;
            
            $item->user_id = \Auth::id();
            $item->name = $request->name;
            $item->type = $request->type;
            $item->gender = $request->gender;
            $item->age = $request->age;
            $item->healthCondition = $request->health;
            $item->recruitement = $request->recruite;
            $item->detail = $request->detail;
            if(isset($request->image)){
                $image = base64_encode(file_get_contents($request->image->getRealPath()));
                // $image = $item->image;
                $item->image = $image;
            }
            
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
