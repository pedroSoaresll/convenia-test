<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'cn_sales';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['value', 'comission', 'date', 'seller_id'];

    public function seller() {
        return $this->belongsTo('App\Seller');
    }
}
