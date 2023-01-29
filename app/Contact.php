<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contact extends Model
{
    protected $table="contacts";
    public function numbers()
    {
        // return $this->hasMany('App\Number');
        return $this->hasMany(Number::class);
    }
    public static function returnRecords($id)
    {
        // return Contact::with(['numbers' => function ($query) use ($request) {
        //     $query->where('contact_id', $request->id);
        // }])->get();


        return Contact::with('numbers')->where('id', $id)->first();


    }
}
