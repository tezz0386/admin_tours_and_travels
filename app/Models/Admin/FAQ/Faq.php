<?php

namespace App\Models\Admin\FAQ;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=[
    	'question',
    	'answer',
    	'status',
    	'slug',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'question'
            ]
        ];
    }
}
