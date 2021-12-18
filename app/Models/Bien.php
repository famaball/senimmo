<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table = 'bien';

    protected $fillable = [
        'libelle',
        'adresse',
        'prix',
        'type',
        'surface',
        'description',
        'image',
        'id_user',
        'id_agence',
        'id_type_bien',
        'id_statut_bien',
        'id_etat_bien',
        'id_localite',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/biens/'.$this->getKey());
    }
}
