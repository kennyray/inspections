<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
	//protected $primaryKey = 'license_number';
    public function inspections()
    {
    	return $this->hasMany(Inspection::class, 'license_number', 'license_number');
    }
}
