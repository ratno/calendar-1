<?php

namespace Voidfire\Calendar;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = [
        'start_date',
        'end_date',
    ];
}
