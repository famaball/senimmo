<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatutBien extends Model
{
    protected $table = 'statut_bien';

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
        return url('/admin/statut-biens/'.$this->getKey());
    }
}
