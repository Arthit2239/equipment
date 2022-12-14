<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends InitModel
{
    use HasFactory;
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
