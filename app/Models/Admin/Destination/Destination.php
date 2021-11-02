<?php

namespace App\Models\Admin\Destination;

use App\Models\Admin\Category\Category;
use App\Models\Booking;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    protected $fillable=[
    	'name',
        'created_by',
        'category_id',
    	'image',
    	'slug',
    	'start_from',
    	'description',
    	'summary',
    	'title_tag',
    	'meta_keywords',
    	'meta_description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'destination_id');
    }
}
