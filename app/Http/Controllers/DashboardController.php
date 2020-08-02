<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioCategory as Category;
use App\Models\Portfolio;
use App\Models\Landing;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('pages.dashboard');
    }

    public function landing()
    {
    	$categories = Category::all();
    	$portfolios = Portfolio::with('category')->get();
        $services = Service::all();
        $landing = Landing::first()->makeHidden('id')->toArray();

    	$item = [
    		'categories' => $categories,
    		'portfolios' => $portfolios,
            'services' => $services,
    	];

    	$item = array_merge($item, $landing);
    	// return($item);
    	return view('welcome', compact('item'));
    }
}
