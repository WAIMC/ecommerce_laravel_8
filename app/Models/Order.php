<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public $timestamps = true;
    protected $fillable  = [
        'name',
        'email',
        'phone',
        'address',
        'note',
        'id_customer',
        'status'
    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];

    // connect get data product by foreign key : 1-n
    // public function product_category()
    // {
    //     return $this->hasOne(Category::class,'id','id_category');
    // }

    // search name with function scope
    public function scopeSearch($query)
    {
        if(request()->key){
            $query = $query->where('email','like',"%".request()->key."%");
        }
        return $query;
    }

    // check product exits in variant 
    public function order_orderDetail()
    {
        return $this->hasMany(OrderDetail::class,'id_order','id');
    }

    // check product exits in order 
    // public function product_orderDetail()
    // {
    //     return $this->hasMany(OrderDetail::class,'id_product','id');
    // }
}
