<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory;
    // use  SoftDeletes;
    // using table category , if doesn't declare $table default table is directory + s : ex categories
    protected $table = 'category';

    // create_at and update_at default realtime, doesn't sent data blank to field
    public $timestamps = true;

    // containing all those fields of table
    protected $fillable = [
        'name',
        'parent_id',
        'slug'
    ];

    // use count()
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    // get category children
    public function categoryChildren()
    {
        return $this->hasMany(category::class,'parent_id');
    }

    // connect get data product by foreign key : 1-n
    public function category_product()
    {
        return $this->hasMany(Product::class,'id_category','id');
    }

    // search item with function scope
    public function scopeSearch($query)
    {
        if(request()->key){
            $query = $query->where('name','like','%'.request()->key.'%');
        }
        return $query;
    }
}
