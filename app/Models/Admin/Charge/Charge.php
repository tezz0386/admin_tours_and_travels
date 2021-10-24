<?php

namespace App\Models\Admin\Charge;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;
    protected $fillable=[
    	'title',
    	'per_day',
    	'per_night',
    	'created_by',
    ];
}
