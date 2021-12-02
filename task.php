<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class task extends Authenticatable
{
    use HasFactory;

    protected $table = "tasks";

    protected $fillable = ["title","description","startdate","enddate","image","user_id"];
 
    public $timestamps = false;

    
}
