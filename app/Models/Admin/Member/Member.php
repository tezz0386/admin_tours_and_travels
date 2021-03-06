<?php

namespace App\Models\Admin\Member;

use App\Models\Admin\Ratting\Ratting;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    protected $fillable=[
        'created_by',
    	'name',
    	'address',
    	'contact_no',
    	'email',
    	'facebook_link',
    	'twitter_link',
    	'designation',
    	'summary',
    	'description',
    	'review',
    	'slug',
        'image',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function ratting()
    {
        return $this->hasMany(Ratting::class, 'member_id');
    }

}
