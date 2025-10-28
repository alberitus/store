<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class segments extends Model
{
    protected $table = 'segments';

    protected $fillable = [
        'segment',
    ];
}
