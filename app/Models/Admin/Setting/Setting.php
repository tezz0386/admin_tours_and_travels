<?php

namespace App\Models\Admin\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=[
    	'name',
    	'email',
    	'address',
    	'close_day',
    	'open_time',
    	'close_time',
    	'contact_no',
    	'toll_free',
    	'logo',
    	'icon',
    	'location',
    	'updated_by',
        'title_tag',
        'summary',
        'description',
        'meta_keywords',
        'meta_description',
    ];
}
