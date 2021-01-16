<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'posttitle',
        'postbody',
        'slug',
    ];
    
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'posttitle'
                ]
            ];
        }

    public function replies() {
        return $this->hasMany('App\Models\Reply');
    }

}
