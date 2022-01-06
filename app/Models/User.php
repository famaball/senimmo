<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'email_verified_at',
        'mot_de_passe',
        'telephone',
        'id_roles',
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

    public function role()
    {
        $this->hasOne(role::class);
    }

    public function agence()
    {
        $this->belongsTo(agence::class);
    }

    public function bien()
    {
        $this->hasMany(bien::class);
    }
}
