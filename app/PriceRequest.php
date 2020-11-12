<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceRequest extends Model
{
    protected $table = 'price_requests';
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
