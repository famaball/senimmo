<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    protected $table = 'localite';

    protected $fillable = [
        'nom',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/localites/'.$this->getKey());
    }

    public function bien()
    {
        $this->hasMany(localite::class);
    }
}
