<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ApplicantDetails;
use App\Education;
use App\LifeStyle;
use App\Partner;

class Applicant extends Model
{
    protected $table = "applicants";

    protected $fillable = ['full_name', 'email', 'password', 'account_controller'];

    public function applicantDetail()
    {
    	return $this->hasOne(ApplicantDetails::class);
    }

    public function education()
    {
    	return $this->hasOne(Education::class);
    }

    public function lifeStyle()
    {
    	return $this->hasOne(LifeStyle::class);
    }

    public function partner()
    {
    	return $this->hasOne(Partner::class);
    }
}
