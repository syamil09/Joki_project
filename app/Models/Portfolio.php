<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo('App\Models\PortfolioCategory', 'category_id');
    }

    public function getImageAttribute($value)
    {
    	return url('storage/'.$value);
    }
}
