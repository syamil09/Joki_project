<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioCategory as Category;
use App\Models\Portfolio;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Portfolio::with('category')->get();

        return view('pages.portfolio.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')
                                 ->store('portfolio', 'public');

        Portfolio::create($data);

        return redirect()->route('portfolio.index')->with('success', 'Success added data');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Portfolio::findOrfail($id);
        $categories = Category::all();

        return view('pages.portfolio.edit', compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|integer|exists:portfolio_categories,id',
            'image' => $request->old_img ? '' : 'required|image',
            'description' => 'required'
        ]);

        $data = $request->except('old_img');
        $data['image'] = $request->hasFile('image') ? $request->file('image')
                                                              ->store('portfolio', 'public') 
                                                    : $request->old_img;
        $update = Portfolio::find($id)->update($data);

        if ($update) {
            return redirect()->route('portfolio.index')->with('success', 'Data Updated');
        }
            return redirect()->route('portfolio.index')->with('failed', 'Data Doesn\'t Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Portfolio::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Data deleted');
    }
}
