<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCampagne extends Model
{
    protected $table = 'type_campagne';

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
        return url('/admin/type-campagnes/'.$this->getKey());
    }

    public function campagne()
    {
        $this->hasMany(campagne::class);
    }
}
