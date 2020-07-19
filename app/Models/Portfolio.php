<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    $guarded = [];

    public function category()
    {
    	return $this->belongsTo('App\Models\PortfolioCategories', 'category_id');
    }
}
