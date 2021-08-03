<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
    public $timestamps = true;
    protected $fillable  = [
        'name',
        'image',
        'subtitle',
        'title_first',
        'title_second'
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
}
