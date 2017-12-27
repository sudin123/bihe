<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lifestyle extends Model
{
    
    public function applicant()
    {
    	return $this->belongsTo(Applicant::class);
    }
}
