<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="جميع التصنيفات";
        if(request()->ajax()){
            $categories=Category::orderBy('id','desc')->get();
            return datatables()->of($categories)->addIndexColumn()->make(true);
        }
        return view('admin.show.categories',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="إضافة تصنيف";
        $action="add";
       return view('admin.show.add-category',compact('title','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category =new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success','تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title="إضافة تصنيف";
        $action="update";
        $category=Category::find($id);
       return view('admin.show.add-category',compact('title','action','category'));
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success','تم حفظ البيانات بنجاح');
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
        Category::find($id)->delete();
        return response()->json(['success' => true]);
    }

    public static function get_categories(){
        return Category::get();
    }
}
