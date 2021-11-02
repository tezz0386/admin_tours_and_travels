<?php

namespace App\Models\Admin\Package;

use App\Models\Admin\Package\PackageCategory;
use App\Models\Admin\Package\Thumbnail;
use App\Models\Booking;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable=[
        'created_by',
    	'name',
    	'package_category_id',
    	'duration_days',
    	'duration_nights',
    	'start_from',
    	'summary',
    	'trip_overview',
    	'itinearary',
    	'pricing_plan',
    	'booking',
    	'thumbnail',
        'title_tag',
        'meta_keywords',
        'meta_description',
        'slug',
        'difficulty',
        'is_off',
        'off_percent',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function thumbnails()
    {
        return $this->hasMany(Thumbnail::class, 'package_id');
    }
    public function category()
    {
        return $this->belongsTo(PackageCategory::class, 'package_category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'package_id');
    }

}
