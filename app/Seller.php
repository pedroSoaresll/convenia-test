<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'cn_seller';
    protected $primaryKey = 'id';
    public $fillable = ['name', 'email'];

    public function sale() {
        return $this->hasMany('App\Sale', 'seller_id');
    }
}
