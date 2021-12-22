<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CiblageCampagne extends Model
{
    protected $table = 'ciblage_campagne';

    protected $fillable = [
        'id_ciblage',
        'id_campagne',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ciblage-campagnes/'.$this->getKey());
    }

    public function campagne()
    {
        $this->hasMany(campagne::class);
    }

    public function ciblage()
    {
        $this->hasMany(ciblage::class);
    }

}
