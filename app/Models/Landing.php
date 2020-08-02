<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $table = 'landing_section';

    protected $guarded = [];

    public function getHeroImageAttribute($value)
    {
    	return url('storage/'. $value);
    }

    public function getCompanyLogoAttribute($value)
    {
    	return url('storage/'. $value);
    }
}
