<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $product_id=request('id');
        $favourite=Favourite::where('user_id',$user->id)->where('product_id',$product_id)->first();
        if(!$favourite){
            $favourite=new Favourite();
            $favourite->user_id=$user->id;
            $favourite->product_id=$product_id;
            $favourite->save();
        }
        $product=Product::find($product_id);
        NotificationController::add_notification($product->user_id,'تم اضافة المنتج '. $product->name .' إلى قائمة إعجاب أحد المستخدمين',"#");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Favourite::find($id)->delete();
        return redirect()->back();
    }
    public static function check_favourite($id){
        $user=Auth::user();
        if(!$user){
            return -1;
        }
        $favourite=Favourite::where('user_id',$user->id)->where('product_id',$id)->first();
        if($favourite){
            return 0;
        }else{
            return 1;
        }
    }
}
