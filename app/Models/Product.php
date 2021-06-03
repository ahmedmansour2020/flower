<?php

namespace App\Models;

use App\Models\User;
use App\Models\ItemImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function images(){
        $images=ItemImage::leftJoin('images','images.id','image_id')->where('item_id',$this->id)->where('item_type','product')->select('path','main','image_id')->get();
        foreach($images as $image){
            $image->path=asset('uploaded/'.$image->path);
        }
        return $images;
    }
}
