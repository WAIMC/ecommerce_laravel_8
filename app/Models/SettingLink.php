<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingLink extends Model
{
    use HasFactory;
    // use  SoftDeletes;
    // using table category , if doesn't declare $table default table is directory + s : ex categories
    protected $table = 'setting_link';

    // create_at and update_at default realtime, doesn't sent data blank to field
    public $timestamps = true;

    // containing all those fields of table
    protected $fillable = [
        'config_key',
        'config_value'
    ];

    // use count()
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    // // get category children
    // public function categoryChildren()
    // {
    //     return $this->hasMany(category::class,'parent_id');
    // }

    // // connect get data product by foreign key : 1-n
    // public function category_product()
    // {
    //     return $this->hasMany(Product::class,'id_category','id');
    // }

    // search item with function scope
    public function scopeSearch($query)
    {
        if(request()->key){
            $query = $query->where('config_key','like','%'.request()->key.'%');
        }
        return $query;
    }

}
