<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
          'detail'=>[
              'title'=>$this->title,
              'description'=>$this->description,
              'img'=>'http://placeimg.com/480/270/any'
          ]
        ];
    }
}
