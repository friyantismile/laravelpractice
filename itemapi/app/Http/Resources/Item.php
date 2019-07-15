<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Item extends JsonResource
{
    /** Yants - you cannot pass the the parameter as array but it must be model 
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['text'=>mb_strimwidth($this->text, 0, 1, '...'),];
    }
}
