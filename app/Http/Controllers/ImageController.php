<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ItemImage;

class ImageController extends Controller
{
    public function add_image($item_id, $item_type, $image, $index, $main = 0)
    {
        $new_image = new Image();
        $file_extension = $image->getClientOriginalExtension();
        $file_name = $item_type . "-" . time() . $index . '.' . $file_extension;
        $path = 'uploaded/';
        $image->move($path, $file_name);
        $new_image->name = $file_name;
        $new_image->save();

        $new_item_image = new ItemImage();
        $new_item_image->image_id = $new_image->id;
        $new_item_image->item_id = $item_id;
        $new_item_image->item_type = $item_type;
        $new_item_image->main = $main;
        $new_item_image->save();
    }

    public static function remove_unused_images()
    {
        $folder = getcwd() . '\\uploaded\\';
        $all_images = Image::get();
        $not_exist = [];
        foreach ($all_images as $image) {
            $exist = ItemImage::where('image_id', $image->id)->first();
            if (!$exist) {
                if (file_exists($folder . $image->name)) {
                    unlink($folder . $image->name);
                }
                array_push($not_exist, $image->id);
            }
        }
        foreach ($not_exist as $id) {
            Image::find($id)->delete();
        }
        $files = scandir($folder);
        if (count($files) > 2) {
            for ($i = 2; $i < count($files); $i++) {
                $exist=Image::where('name',$files[$i])->first();
                if(!$exist){
                    unlink($folder . $files[$i]);
                    }
            }

        }
    }
    public static function view_product_image($id){
        $image=ItemImage::leftJoin('images','images.id','item_images.image_id')->where('item_type','product')->where('item_id',$id)->select('name')->first();
        if($image){
            return asset('uploaded/'.$image->name);
        }else{
            return null;
        }
    }

}
