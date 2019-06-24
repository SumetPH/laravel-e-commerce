<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseBill extends Model
{
    public function products()
    {
        return $this->hasMany('App\PurchaseProduct');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
