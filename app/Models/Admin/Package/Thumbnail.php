<?php

namespace App\Models\Admin\Package;

use App\Models\Admin\Package\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    use HasFactory;
    protected $fillable = [
    	'image',
    	'package_id',
    ];
    public function package()
    {
    	return $this->belongsTo(Package::class, 'package_id');
    }
}
