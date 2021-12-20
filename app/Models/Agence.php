<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $table = 'agence';

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'email_verified_at',

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
        return url('/admin/agences/'.$this->getKey());
    }

    public function user()
    {
        $this->hasMany(user::class);
    }

    public function bien()
    {
        $this->hasMany(bien::class);
    }
}
