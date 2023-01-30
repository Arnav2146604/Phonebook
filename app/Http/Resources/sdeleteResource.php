<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class sdeleteResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
// dd(debug_backtrace());
        return [
            'id' => $this->id, 
            'contact_id' => $this->contact_id,
            'num' => $this->num
        ];
        // dd($this);
        // return ['abc'=> '333'];
    }

    // public static function sdeletenums($request)
    // {
    //     return toArray($request);
    // }
}
