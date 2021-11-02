<?php

namespace App\Models\Admin\Activity;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    protected $fillable=[
    	'name',
        'slug',
    	'summary',
    	'created_by',
    	'description',
    	'title_tag',
    	'meta_keywords',
    	'meta_description',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
