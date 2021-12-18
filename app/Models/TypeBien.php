<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeBien extends Model
{
    protected $table = 'type_bien';

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
        return url('/admin/type-biens/'.$this->getKey());
    }
}
