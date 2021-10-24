<?php

namespace App\Models\Admin\Testimonial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable=[
    	'name',
    	'speech',
    	'image',
    	'summary',
    	'status',
    ];
}
