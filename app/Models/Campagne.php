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
}
