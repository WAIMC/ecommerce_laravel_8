<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    public $timestamps = true;
    protected $fillable  = [
        'title',
        'short_description',
        'description',
        'image',
        'author'

    ];

    protected $dates = [
        'create_at',
        'update_at'
    ];

    // search item with function scope
    public function scopeSearch($query)
    {
        if(request()->key){
            $query = $query->where('title','like',"%".request()->key."%");
        }
        return $query;
    }
}
