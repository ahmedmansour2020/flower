<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\ImageController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "منتجاتي";
        $user = Auth::user();
        $category=null;
        if(isset($_GET['category'])){
            $category=$_GET['category'];
            $products=Product::where('user_id',$user->id)->where('category_id',$_GET['category'])->orderBy('id','desc')->paginate(4);
        }else{
            $products=Product::where('user_id',$user->id)->orderBy('id','desc')->paginate(4);
        }
        return view('vendor.product', compact('title','products','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "إضافة منتج";
        $action = "add";
        $categories=Category::get();
        return view('vendor.add-product', compact('title', 'action','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Product();
        $user = Auth::user();
        $item->user_id = $user->id;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->qty = $request->qty;
        $item->price = $request->price;
        $item->offer = $request->offer;
        $item->category_id=$request->category;
        $item->save();
        $util = new ImageController();
        if ($request->hasfile('images')) {
            $index = 0;
            foreach ($request->file('images') as $image) {
                if ($index == 0) {
                    $util->add_image($item->id, 'product', $image, $index, 1);
                } else {
                    $util->add_image($item->id, 'product', $image, $index);
                }
                $index++;
            }
        }
        return redirect()->route('product.index')->with('success', 'تم إضافة المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "تعديل بيانات منتج";
        $action = "update";
        $item = new ProductResource(Product::find($id));
        $categories=Category::get();

        return view('vendor.add-product', compact('title', 'action', 'item','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Product::find($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->qty = $request->qty;
        $item->price = $request->price;
        $item->offer = $request->offer;
        $item->category_id=$request->category;

        $item->save();
        
        if ($request->hasfile('images')) {
            ItemImage::where('item_id', $item->id)->where('item_type', 'product')->delete();
            $util = new ImageController();
            $index = 0;
            foreach ($request->file('images') as $image) {
                if ($index == 0) {
                    $util->add_image($item->id, 'product', $image, $index , 1);
                } else {
                    $util->add_image($item->id, 'product', $image, $index );
                }
                $index++;
            }
        }
        return redirect()->route('product.index')->with('success', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        ItemImage::where('item_type','product')->where('item_id', $id)->delete();
        Favourite::where('product_id',$id)->delete();
        Product::where('id',$id)->delete();
        return redirect()->back()->with('success','تم حذف المنتج بنجاح');
    }
}
