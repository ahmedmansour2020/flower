<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UtilController;
use App\Http\Resources\ProductResource;
use App\Models\ItemImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (request()->ajax()) {
            $products = Product::all()->where('user_id', $user->id);
            $products = ProductResource::collection($products);

            return datatables()->of($products)->addIndexColumn()->make(true);
        }
        return view('admin.show.products', compact('title'));
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
        return view('admin.add.product', compact('title', 'action'));
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
        $item->save();
        $util = new UtilController();
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
        return redirect()->back()->with('success', 'تم إضافة المنتج بنجاح');
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

        return view('admin.add.product', compact('title', 'action', 'item'));
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
        $item->save();
        ItemImage::where('item_id', $item->id)->where('item_type', 'product')->delete();
        $util = new UtilController();

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
        return redirect()->back()->with('success', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
