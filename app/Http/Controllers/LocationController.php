<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public static function getCities()
    {
        return City::orderBy('name', 'ASC')->get();
    }
    public function areas()
    {
        $title = "الأحياء";
        if (request()->ajax()) {
            $areas = Area::leftJoin('cities', 'city_id', 'cities.id')->orderBy('name', 'ASC')->select('areas.*', 'cities.name as city_name')->get();
            return datatables()->of($areas)->addIndexColumn()->make(true);
        }
        return view('admin.show.areas', compact('title'));
    }
    public function create_area()
    {
        $title = "إضافة الحي";
        $action = "add";
        $cities = City::get();

        return view('admin.show.add-area', compact('title', 'cities','action'));
    }
    public function edit_area($id)
    {
        $title = "تعديل الحي";
        $action = "update";
        $cities = City::get();
        $area = Area::find($id);
        return view('admin.show.add-area', compact('title', 'action','cities', 'area'));
    }
    public function store_area(Request $request){
        $area=new Area();
        $area->name=$request->name;
        $area->city_id=$request->city_id;
        $area->save();

        return redirect()->route('areas')->with('success','تم حفظ البيانات بنجاح');
    }
    public function update_area(Request $request,$id){
        $area= Area::find($id);
        $area->name=$request->name;
        $area->city_id=$request->city_id;
        $area->save();

        return redirect()->route('areas')->with('success','تم حفظ البيانات بنجاح');
    }
    public function destroy(Request $request)
    {
        $id = request('id');
        $users = User::where('area_id', $id)->get();
        foreach ($users as $item) {
            $user = User::find($item->id);
            $user->area_id = null;
            $user->save();
        }
        Area::find($id)->delete();
        return response()->json([
            "success" => true,

        ]);
    }
    public function getAreas(Request $request){
        $areas=Area::where("city_id",request('id'));
        return response()->json([
            "success" => true,
            "areas"=>$areas
        ]);
    }
}
