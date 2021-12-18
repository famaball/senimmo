<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtatBien extends Model
{
    protected $table = 'etat_bien';

    protected $fillable = [
        'designation',
        'description',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/etat-biens/'.$this->getKey());
    }
}
