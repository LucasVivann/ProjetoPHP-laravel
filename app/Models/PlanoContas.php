<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoContas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
       'conta',
        
        
    ];
}

