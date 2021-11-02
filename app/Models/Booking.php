<?php

namespace App\Models;

use App\Models\Admin\Destination\Destination;
use App\Models\Admin\Package\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
    	'name',
    	'email',
    	'contact_no',
    	'adults',
    	'childs',
    	'charge',
    	'arrival',
    	'departure',
    	'package_id',
        'destination_id',
    	'address',
    	'is_confirmed',
    	'is_read',
    ];
    public function destination()
    {
        $this->belongsTo(Destination::class, 'destination_id');
    }
    public function package()
    {
        $this->belongsTo(Package::class, 'destination_id');
    }
}
