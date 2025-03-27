<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;



class ProductController extends Controller
{
    public function index(Request $request)
    {
        //$products=Product::all();

        $sort=$request->input('sort','asc');
        $products=Product::orderBy('price',$sort)->Paginate(6);


        return view('products',compact('products'));
    }



    public function search(Request $request)
    {
        $query=Product::query();
        if($request->filled('keyword')){
            $query->where('name','like','%'. $request->keyword.'%');
        }

        $products=$query->paginate(6);


        return view('products',compact('products'));
    }



    public function edit($id)
    {
        $product=Product::with('seasons')->findOrFail($id);
        $seasons=Season::all();

            return view('edit',compact('product', 'seasons'));
    }



    public function update(ProductRequest $request,$id)
    {
        $product=Product::findOrFail($id);
        $product->seasons()->sync($request->seasons);

        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;

    /*画像更新処理*/
        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName=$image->getClientOriginalName();/*元のファイル名を取得*/
            $image->storeAs('public/image', $imageName);/*public/image フォルダに保存*/
            $product->image=$imageName;/*データベースのimageカラムに保存*/


        }

        $product->save();

        /*seasonsの選択を更新*/
        if($request->has('seasons')){
            $product->seasons()->sync($request->seasons);
        }

        return redirect()->route('products');
    }




    public function destroy($id)
    {
        $product=Product::findOrFail($id);

            $product->delete();



        return redirect()->route('products');

    }




    public function create()
    {
        $seasons=Season::all();

        return view('register',compact('seasons'));
    }


    public function profile()
    {
        return view('profile');
    }


    public function store(ProductRequest $request)
    {

        //画像
        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName=$image->getClientOriginalName();/*元のファイル名を取得*/
            $image->storeAs('public/image', $imageName);/*public/image フォルダに保存*/


        }

        $product=Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'image'=>$imageName,
            'description'=>$request->description,

        ]);

    //中間テーブルに保存
        if($request->has('seasons')){
            $product->seasons()->sync($request->seasons);
        }

        if($request->has('back')){
            return redirect('products')->withInput();
        }

        Profile::create($request->only([
            'user_id',
            'gender',
            'birthday'
        ]));

        return redirect()->route('products');

}


}