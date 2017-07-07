<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
    public function goods()
    {
    	return $this->belongsTo(Goods::class,'goods_id');
    }
}
