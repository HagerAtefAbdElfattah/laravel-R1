<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Place;
use App\Traits\Common;
use Illuminate\Support\Facades\Redirect;
use Symfony\Contracts\Service\Attribute\Required;

class PlaceController extends Controller
{
    use Common;
    public function messages()
    {
       return [
        'title.required'=>'Title is required',
        'content.required'=> 'يجب ادخال نص دون ارقام',
        'priceFrom.required'=>'This is must be A Number',
        'priceTo.required'=>'This is must be A Number',
        'image.required'=>'please choose your image'
        ];
    }
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::latest()->take(6)->get();
        // $places = Place::get();
        return view("place", compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addPlaces');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $messages = $this->messages();
        $data = $request->validate([
            'title'=>'Required|string|max:100',
            'content'=>'Required|string',
            'priceFrom' => 'Required|integer',
            'priceTo' => 'Required|integer',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
             ], $messages);

          $fileName = $this->uploadFile($request->image, 'assets\images');
          $data['image']=$fileName;
          $data['published'] = isset($request['published']);

          Place::create($data);
          return "Your data has been add successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $places = Place::FindOrFail($id);
        return view('tours',compact('places'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
       Place:: where('id', $id)->delete();
       return redirect('placeTable');
    }
    public function explore()
    {
        // to show the "explore" section with the layout ->yield and extend----by press the "explore" button in "place" homepage
        // $places = Place::get();
        $places = Place::latest()->take(6)->get();
        return view("extendExplore", compact('places'));
        
    }

    public function placeTable()
    {
        // to show the "places" in database in a table of page "placeTable"
        $places = Place::get();
        return view("placeTable", compact('places'));
        
    }
    
    /**
     * The trashed data.
     */
    public function trashed() 
    {
        $places = Place::onlyTrashed()->get();
       return view('trashedPlace',compact('places'));
    }

    /**
     * To restore the soft deleted data.
     */
    public function restore(string $id) : RedirectResponse
    {
       Place:: where('id', $id )->restore();
        return redirect('placeTable');
    }


   
}
