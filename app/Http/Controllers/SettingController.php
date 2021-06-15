<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public static function get_login_image(){
        $image=Setting::where('key','login_image')->first();
        if($image){
            return asset('uploaded/'.$image->value);
        }else{
            return null;
        }
    }
    public function to_sliders()
    {
        $title = "اعلانات الصفحة الرئيسية";
        if (request()->ajax()) {
            $sliders = Slider::orderBy('id', 'desc')->get();
            $index = 1;
            foreach ($sliders as $item) {
                $item->index = $index++;
                $item->image = asset('uploaded/' . $item->image);
            }
            return datatables()->of($sliders)->addIndexColumn()->make(true);
        }
        return view('admin.settings.sliders', compact('title'));
    }
    public function create_slider()
    {
        $title = "إضافة اعلان جديد";
        $action = "add";
        return view('admin.settings.add-slider', compact('title', 'action'));
    }
    public function edit_slider($id)
    {
        $title = "تعديل اعلان ";
        $action = "update";
        $saved = Slider::find($id);
        $saved->image = asset('uploaded/' . $saved->image);
        return view('admin.settings.add-slider', compact('title', 'action', 'saved'));
    }
    public function save_slider(Request $request)
    {
        $slider = new Slider();
        $slider->content = request('content');
        $slider->url = request('url');
        $slider->color = request('color');
        $slider->button_font = request('button_font');
        $slider->button_title = request('button_title');
        $slider->button_color = request('button_color');
        if (request('image')) {
            $file_extension = request('image')->getClientOriginalExtension();
            $file_name = "slider-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->image->move($path, $file_name);
            $slider->image = $file_name;
        }
        $slider->save();
        return redirect()->route('setting.sliders')->with('success', __('تم اضافة الصورة بنجاح'));
    }
    public function update_slider(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->content = request('content');
        $slider->url = request('url');
        $slider->color = request('color');
        $slider->button_font = request('button_font');
        $slider->button_title = request('button_title');
        $slider->button_color = request('button_color');
        if (request('image')) {
            $file_extension = request('image')->getClientOriginalExtension();
            $file_name = "slider-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->image->move($path, $file_name);
            $slider->image = $file_name;
        }
        $slider->save();
        return redirect()->route('setting.sliders')->with('success', __('تم تحديث الصورة بنجاح'));
    }
    public function slider_delete_image(Request $request)
    {
        $id = request('id');

        DB::update('update sliders set image = null where id = ?', [$id]);
        return response()->json([
            'success' => true,

        ]);
    }
    public function delete_slider($id)
    {
        Slider::find($id)->delete();
        return redirect()->back()->with('success', __('تم حذف الصورة بنجاح'));
    }
    public function change_slider_status(Request $request)
    {
        $id = request('id');
        $slider = Slider::find($id);
        if ($slider->status == 0) {
            $slider->status = 1;
        } else {
            $slider->status = 0;
        }
        $slider->save();
        return response()->json([
            'success' => true,
        ]);
    }
}
