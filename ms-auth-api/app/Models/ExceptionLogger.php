<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExceptionLogger extends Model
{
    protected $fillable = [
        'uuid',
        'environment',
        'end_point',
        'code',
        'message',
        'request'
    ];
}
