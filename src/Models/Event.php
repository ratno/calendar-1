<?php

namespace Voidfire\Calendar\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = [
        'start_date',
        'end_date',
    ];
}
