<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function polyclinic(){
        return $this->belongsTo(Polyclinic::class);
    }

    public function reason(){
        return $this->belongsTo(Reason::class);
    }

    public function getCreatedAtAttribute($value) {
        $mon = array('янв','фев','мар','апр','мая','июн','июл','авг','сен','окт','ноя','дек');
        $date = \Carbon\Carbon::parse($value)->format('d ');
        $date .= $mon[\Carbon\Carbon::parse($value)->format('n')-1];
        $date .= \Carbon\Carbon::parse($value)->format(' Yг H:i');
        return $date;
    }
}
