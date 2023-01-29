<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Number extends Model
{
    use SoftDeletes;
    protected $table = "numbers";
    public function contacts()
    {
        // return $this->belongsTo('App\Contact', contact_id);
        return $this->belongsTo(Contact::class);
    }
}
