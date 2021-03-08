<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $connection = 'smart_wifi';
    protected $table = 'guests';
    protected $guarded = [''];

    protected $casts = [
        'attributes' => 'array'
    ];

}
