<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membership extends Model
{
     use HasFactory;
     public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'dob',
        'phonenumber',
        'affiliatedto',
        'leadership_position',
        'academic_qualification',
        'council_number',
        'province',
        'district',
        'residental_area',
        'prefix',
        'why_member',
        'known_from',
        'refered_name',
    ];
}