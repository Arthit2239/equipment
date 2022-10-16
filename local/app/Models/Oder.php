<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends InitModel
{
    use HasFactory;
    protected $table = 'oder';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
