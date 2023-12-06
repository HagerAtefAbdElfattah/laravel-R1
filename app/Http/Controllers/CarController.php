<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
use App\Traits\Common;
use Symfony\Contracts\Service\Attribute\Required;

class CarController extends Controller
{
    use Common;
    private $columns = ['carTitle','price', 'description', 'published','image'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view("cars", compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    $car = new Car;
    //    $car->carTitle =$request->carTitle;
    //    $car->price = $request->price;
    //    $car->description =$request->description;
    //    if(isset($request->published)){
    //     $car->published = true;
    //    }else{
    //     $car->published = false;
    //    }
    //    $car->save();
        //   $data = $request->only($this->columns);
        //   $data['published'] = isset($data['published'])? true:false;
           $messages=[
            'carTitle.required'=>'Title is required',
            'price.required'=>'This is A Number',
            'description.required'=> 'يجب ادخال نص دون ارقام',
            ];
           $data = $request->validate([
            'carTitle'=>'Required|string|max:100',
            'price' => 'Required|integer',
            'description'=>'Required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
             ], $messages);

          $fileName = $this->uploadFile($request->image, 'assets\images');
          $data['image']=$fileName;
          $data['published'] = isset($request['published']);

          Car::create($data);
          return 'done';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car:: FindOrFail($id);
        return view('carDetails',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car:: FindOrFail($id);
        return view('updateCar',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        // $data = $request->only($this->columns);
        // $data['published']=isset($data['published'])? true:false;
        // -----------you can use the messages in a method
        // public function messages(){
        // return [
        //     'carTitle.required'=>'Title is required',
        //     'description.required'=> 'should be text',
        // ];
        // }
         $messages=[
            'carTitle.required'=>'Title is required',
            'price.required'=>'This is A Number',
            'description.required'=> 'يجب ادخال نص دون ارقام',
            ];
         $data = $request->validate([
            'carTitle'=>'Required|string|max:100',
            'price' => 'Required|integer',
            'description'=>'Required|string'
             ], $messages);

          if (isset($request->image)) {
            $request->validate([ 'image' => 'required|mimes:png,jpg,jpeg|max:2048']);
            $fileName = $this->uploadFile($request->image,'assets\images');
            
          }else {
            $fileName = $request->oldImage;
          }
          $data['image'] = $fileName;
          $data['published'] = isset($request['published']);
          car::where('id', $id)->update($data);

        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        Car::where('id', $id)->delete();
       return redirect('cars');
    }


    /**
     * The trashed data.
     */
    public function trashed() 
    {
        $cars= Car::onlyTrashed()->get();
       return view('trashedCar',compact('cars'));
    }

    /**
     * To restore the soft deleted data.
     */
    public function restore(string $id) : RedirectResponse
    {
        Car:: where('id', $id )->restore();
        return redirect('cars');
    }

    // to force delete-----

    public function forceDelete(string $id): RedirectResponse
    {
    Car::where('id', $id)->forceDelete();
    return redirect('cars');
    }

}
