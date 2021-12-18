<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';

    protected $fillable = [
        'date',
        'etat',
        'description',
        'prenom',
        'nom',
        'telephone',
        'email',
        'adresse',
    
    ];
    
    
    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/reservations/'.$this->getKey());
    }
}
