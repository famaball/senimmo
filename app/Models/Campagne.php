<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    protected $table = 'campagne';

    protected $fillable = [
        'nom',
        'sujet',
        'contenu',
        'nom_emetteur',
        'email_emetteur',
        'send_to_all',
        'id_type_campagne',
        'id_statut_campagne',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/campagnes/'.$this->getKey());
    }

    public function type_statut_campagne()
    {
        $this->hasOne(type_statut_campagne::class);
    }

    public function type_campagne()
    {
        $this->hasOne(type_campagne::class);
    }

    public function ciblage()
    {
        $this->hasMany(ciblage::class);
    }
}
