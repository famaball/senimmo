<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationBien extends Model
{
    protected $table = 'reservation_bien';

    protected $fillable = [
        'id_users',
        'id_bien',
        'id_reservation',
        'date_reservation',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/reservation-biens/'.$this->getKey());
    }
}
