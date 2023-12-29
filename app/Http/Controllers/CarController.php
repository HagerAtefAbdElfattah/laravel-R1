<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;
use PhpParser\Node\Stmt\Return_;
use Symfony\Contracts\Service\Attribute\Required;

class CarController extends Controller
{
    use Common;
    private $columns = ['carTitle','price', 'description', 'published','image','category_id'];
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
        $categories = Category::select('id', 'categoryName')->get();
       return view('addCar',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
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
            'carTitle.required'=>__('messages.carTitleError'),
            'price.required'=>__('messages.priceError'),
            'description.required'=>__('messages.describtionError'),
            'image.required'=>__('messages.imageError'),
            'category_id.required'=> __('messages.categoryError'),
            ];
           $data = $request->validate([
            'carTitle'=>'Required|string|max:100',
            'price' => 'Required|integer',
            'description'=>'Required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id'=>'Required|in:1,2'
             ], $messages);

          $fileName = $this->uploadFile($request->image, 'assets\images');
          $data['image']=$fileName;
          $data['published'] = isset($request['published']);

          Car::create($data);
          return redirect('cars');
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
        // this variable $categories is for displaying the category in the foreach--->
        $categories = Category::select('id', 'categoryName')->get();
        return view('updateCar',compact('car','categories'));
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
            'category_id.required'=> 'You must choose a category'
            ];
         $data = $request->validate([
            'carTitle'=>'Required|string|max:100',
            'price' => 'Required|integer',
            'description'=>'Required|string',
            'category_id'=>'Required',
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
