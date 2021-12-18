<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactCampagne extends Model
{
    protected $table = 'contact_campagne';

    protected $fillable = [
        'id_type_contact',
        'id_campagne',
        'id_contact',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/contact-campagnes/'.$this->getKey());
    }
}
