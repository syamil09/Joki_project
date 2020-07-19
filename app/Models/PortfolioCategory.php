<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    protected $guarded = [];

    public function portfolios()
    {
    	return $this->hasMany('App\Models\Portfolio');
    }
}
