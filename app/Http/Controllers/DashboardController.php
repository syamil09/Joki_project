<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioCategory as Category;
use App\Models\Portfolio;

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

    	$item = [
    		'categories' => $categories,
    		'portfolios' => $portfolios
    	];

    	
    	// dd($item);
    	return view('welcome', compact('item'));
    }
}
