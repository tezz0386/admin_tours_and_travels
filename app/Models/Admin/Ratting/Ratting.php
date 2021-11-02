<?php

namespace App\Models\Admin\Ratting;

use App\Models\Admin\Member\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratting extends Model
{
    use HasFactory;
    protected $fillable=[
    	'member_id',
    	'ip_address',
    	'rate',
    ];
    public function member()
    {
    	return $this->belongsTo(Member::class, 'member_id');
    }
}
