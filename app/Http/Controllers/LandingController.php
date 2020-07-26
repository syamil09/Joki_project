<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Landing;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function heroGet()
    {
        $item = Landing::select('id',
                                'hero_title', 
                                'hero_description', 
                                'hero_image')->first();
        
        return view('pages.landing.hero', compact('item'));
    }

    public function heroUpdate(Request $request, $id)
    {
        $request->validate([
            'hero_title' => 'required|max:50',
            'hero_description' => 'required',
            'hero_image' => $request->old_img ? '' : 'required|image'
        ]);
        
        $data = $request->except('old_img');
        $data['hero_image'] = $request->hasFile('hero_image') ? $request->file('hero_image') 
                                                              ->store('hero', 'public')
                                                    : $request->old_img;
                                                  
        $update = Landing::findOrFail($id)->update($data);

        if ($update) {
            return redirect()->route('hero.index')->with('success', 'Data Updated');
        }
            return redirect()->route('hero.index')->with('failed', 'Data Doesn\'t Updated');
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
