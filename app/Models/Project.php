<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model

{
   use HasFactory;
     public $timestamps = false;
         protected $fillable = ['title', 'description', 'feature_image', 'upload_date'];

}