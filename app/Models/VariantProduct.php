<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class VariantProduct extends Model
{
    use HasFactory;
    protected $table = 'variant_product';
    public $timestamps = true;
    protected $fillable  = [
        'id_product',
    	'color',
    	'color_code',
    	'quantity',
    	'price',
    	'discount',
    	'gallery',
    	'status'
    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];

    // search item with function scope
    public function scopeSearch($query)
    {
        if(request()->key){
            $query = $query->where('name','like',"%".request()->key."%");
        }
        return $query;
    }

    // check product exits in order 
    // public function product_orderDetail()
    // {
    //     return $this->hasMany(OrderDetail::class,'id_product','id');
    // }
}
