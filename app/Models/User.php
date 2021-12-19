<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'email_verified_at',
        'mot_de_passe',
        'telephone',
        'id_profile',
        'id_agence',
    
    ];
    
    protected $hidden = [
        'remember_token',
    
    ];
    
    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/users/'.$this->getKey());
    }
}
