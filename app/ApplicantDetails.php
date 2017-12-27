<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Applicant;

class ApplicantDetails extends Model
{
    protected $table = "applicant_details";

    protected $fillable = ['applicant_id', 'first_name', 'middle_name', 'last_name', 'caste', 'gothra', 'city', 'about_self', 'about_family', 'education', 'occupation'];

    public function applicant()
    {
    	return $this->belongsTo(Applicant::class);
    }
}
