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
        'surface',
        'description',
        'image',
        'id_user',
        'id_agence',
        'id_typebien',
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

    public function user()
    {
        $this->belongsTo(user::class);
    }

    public function agence()
    {
        $this->belongsTo(agence::class);
    }

    public function typebien()
    {
        $this->hasOne(typebien::class);
    }

    public function statut_bien()
    {
        $this->hasOne(statut_bien::class);
    }

    public function etat_bien()
    {
        $this->hasOne(etat_bien::class);
    }

    public function localite()
    {
        $this->belongsTo(localite::class);
    }
}
