<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $dates = ['start', 'stop'];

    protected $appends = [
        'startFullDate',
        'stopTime',
    ];

    public function getStartFullDateAttribute(){
        return $this->start->formatLocalized('%e %b %H:%M');
    }

    public function getStopTimeAttribute(){
        return $this->stop->format('H:i');
    }
}
