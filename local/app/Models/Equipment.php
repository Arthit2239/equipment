<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends InitModel
{
    use HasFactory;
    protected $table = 'equipment';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
