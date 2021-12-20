<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typebien extends Model
{
    protected $table = 'typebien';

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
        return url('/admin/typebiens/'.$this->getKey());
    }

    public function bien()
    {
        $this->hasMany(bien::class);
    }
}
