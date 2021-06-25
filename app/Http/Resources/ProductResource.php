<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'user_name'=>$this->user->name,
            'name'=>$this->name,
            'description'=>$this->description,
            'price'=>$this->price,
            'qty'=>$this->qty,
            'image'=>$this->images(),
            'status'=>$this->status,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'created_date'=>date('Y-m-d',strtotime($this->created_at)),
            'created_time'=>date('H:i:s',strtotime($this->created_at)),
            'updated_date'=>date('Y-m-d',strtotime($this->updated_at)),
            'updated_time'=>date('H:i:s',strtotime($this->updated_at)),
        ];
    }
}
