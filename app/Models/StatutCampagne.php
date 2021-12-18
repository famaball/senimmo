<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatutCampagne extends Model
{
    protected $table = 'statut_campagne';

    protected $fillable = [
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
        return url('/admin/statut-campagnes/'.$this->getKey());
    }
}
