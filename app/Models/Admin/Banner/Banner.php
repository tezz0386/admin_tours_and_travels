<?php

namespace App\Models\Admin\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
    	'top_heading',
    	'bottom_heading',
    	'image',
    	'created_by',
    ];

}
