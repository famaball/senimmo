<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeContact extends Model
{
    protected $table = 'type_contact';

    protected $fillable = [
        'libelle',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/type-contacts/'.$this->getKey());
    }

    public function contact()
    {
        $this->hasMany(contact::class);
    }
}
