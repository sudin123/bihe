<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    
    public function applicant()
    {
    	return $this->belongsTo(Applicant::class);
    }
}
