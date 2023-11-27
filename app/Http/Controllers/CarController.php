<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    private $columns = ['carTitle','price', 'description', 'published'];
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
       $car = new Car;
       $car->carTitle =$request->carTitle;
       $car->price = $request->price;
       $car->description =$request->description;
       if(isset($request->published)){
        $car->published = true;
       }else{
        $car->published = false;
       }
       $car->save();
       return '<script>alert("Your data has been inserted successfully")</script>';
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
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published']=isset($data['published'])? true:false;
        car::where('id', $id)->update($data);
        return '<script>alert("updated successfully")</script>';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
       return 'The car is deleted successfully';
    }
}
