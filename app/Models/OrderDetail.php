<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    public $timestamps = true;
    protected $fillable  = [
        'id_order',
    	'id_variant_product',
    	'name',
    	'quantity',
    	'price'
    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];

    // get variant product
    public function getVariantProduct()
    {
        return $this->hasMany(VariantProduct::class,'id','id_variant_product');
    }
}
