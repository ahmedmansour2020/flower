<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ItemImage;
use Illuminate\Http\Request;

class UtilController extends Controller
{
    public static function add_image($item_id,$item_type,$image,$main=0){
            $new_image=new Image();
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = $item_type."-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $image->move($path, $file_name);
            $new_image->path = $file_name;
            $new_image->save();

            $new_item_image=new ItemImage();
            $new_item_image->image_id=$new_image->id;
            $new_item_image->item_id=$item_id;
            $new_item_image->item_type=$item_type;
            $new_item_image->main=$main;
            $new_item_image->save();
    }
}
