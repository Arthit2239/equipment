<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashbord extends InitModel
{
    use HasFactory;
    protected $table = 'dashboard';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
