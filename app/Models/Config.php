<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';

    protected $fillable = [
        'project_id', 'start_date', 'end_date', 'prob', 'ip_limit',
        'times_limit', 'lottery_times_limit'
    ];
}
