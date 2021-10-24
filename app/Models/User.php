<?php

namespace App\Models;

use App\Models\Admin\Blog\Blog;
use App\Models\Admin\Category\Category;
use App\Models\Admin\Destination\Destination;
use App\Models\Admin\Package\Package;
use App\Models\Admin\Package\PackageCategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_no',
        'address',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function categories()
    {
        return $this->hasMany(Category::class, 'created_by');
    }
    public function destinations()
    {
        return $this->hasMany(Destination::class, 'created_by');
    }
    public function packageCategories()
    {
        return $this->hasMany(PackageCategory::class, 'created_by');
    }
    public function packages()
    {
        return $this->hasMany(Package::class, 'created_by');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'created_by');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
