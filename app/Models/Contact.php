<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'localite',
        'sexe',
        'id_type_contact',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/contacts/'.$this->getKey());
    }

    public function type_contact()
    {
        $this->hasOne(type_contact::class);
    }
}
