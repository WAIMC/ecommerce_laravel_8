<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    public $timestamps = true;
    protected $fillable  = [
        'id_customer',
        'id_product',
        'comment',
        'rating_star',
        'status'
    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];

    // get information user 
    public function review_user()
    {
        return $this->hasOne(Customer::class,'id','id_customer');
    }

    // get information product
    public function review_product()
    {
        return $this->hasOne(Product::class,'id','id_product');
    }

    // search name with function scope
    // public function scopeSearch($query)
    // {
    //     if(request()->key){
    //         $query = $query->where('name','like',"%".request()->key."%");
    //     }
    //     return $query;
    // }

    // check product exits in order 
    // public function product_orderDetail()
    // {
    //     return $this->hasMany(OrderDetail::class,'id_product','id');
    // }
}
