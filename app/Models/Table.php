<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';

    protected $fillable = [
        'name', 'alias', 'engine', 'charset', 'auto_increment',
    ];
}
