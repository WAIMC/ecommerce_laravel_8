<?php

namespace App\Models;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = true;
    protected $fillable  = [
        'name',
        'description',
        'image',
        'status',
        'id_category'
    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];

    // connect get data product by foreign key : 1-n
    public function product_category()
    {
        return $this->hasOne(Category::class,'id','id_category');
    }

    // search name with function scope
    public function scopeSearch($query)
    {
        if(request()->key){
            $query = $query->where('name','like',"%".request()->key."%");
        }
        return $query;
    }

    // search all product in category choose
    public function scopeSearchCategory($query)
    {
        if(request()->searchCategory){
            $query = $query->where('id_category',request()->searchCategory);
        }
        return $query;
    } 

    // check product exits in variant 
    public function product_variantProduct()
    {
        return $this->hasMany(VariantProduct::class,'id_product','id');
    }

    // get review (comment, rating star,..)
    public function product_review()
    {
        return $this->hasMany(Review::class,'id_product','id');
    }

    // check product exits in order 
    // public function product_orderDetail()
    // {
    //     return $this->hasMany(OrderDetail::class,'id_product','id');
    // }
}
