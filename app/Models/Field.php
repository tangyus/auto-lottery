<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';

    protected $fillable = [
        'table_name', 'name', 'type', 'length', 'default', 'comment', 'can_del',
        'indexes'
    ];
}
