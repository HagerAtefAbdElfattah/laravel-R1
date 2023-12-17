<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\AddCar;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlaceController;
use App\Models\News;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

--------------session2-------------------------------------------------------------------------
*/
// regural expression------need search--
// Route::get ('user/{name}/{age?}',function ($name,$age=0){
//     $msg = 'the username is : ' . $name;
//     if($age > 0){
//         $msg .= ' and age is: ' . $age ;
//     }
//     return $msg ;
// })->where(['age'=>'[0-9]+', 'name'=>'[a-zA-Z0-9]+']);

/*Route::get('test', function () {
    return 'welcome to my first route';
});


Route::prefix('products')->group(function () {
        Route::get('/', function(){
        return 'products home page';
        });

        Route::get('camera', function(){
        return 'camera page';
        });

        Route::get('laptop', function(){
        return 'laptops page';
        });

        Route::get('projector', function(){
        return 'projectors page';
        });
});
// write a fall back to come back agin to the page i want
Route::fallback(function(){
    return redirect('/');
});*/


Route::get('/', function () {
    return view('welcome');
});


// ----------------task2-----------------------------------------------------------
Route::get('about', function () {
    return "<h1> This is a laravel learning project </h1>";
});

Route::get('contactUs', function () {
    return "<h1> You can contact us on support page </h1>" ;
});

Route::prefix('support')->group(function () {
   
    Route::get('/', function(){
    return "<h1> You can contact us by chat, call or ticket </h1>";
    });

    Route::get('chat/{name?}/{age?}', function($name, $age=0){
        $chatmsg = 'the username is : ' . $name;
        if($age > 0){
            $chatmsg .= ' and age is: ' . $age ;
       }
        return $chatmsg ;
    })->where(['age'=>'[0-9]+', 'name'=>'[a-zA-Z0-9]+']);

    Route::get('call/{callname}/{num?}', function($callname , $num=0){
        $callmsg = 'the username is : ' . $callname;
            if($num > 0){
                $callmsg .= ' and your number is: ' . $num ;
            }
            return $callmsg ;
    })->where(['num'=>'[0-9]{8,11}+', 'callname'=>'[a-zA-Z]+']);
            //    {8,11} only 8 numbers or 11 numbers
    Route::get('ticket', function(){
    return 'tickets home page';
    });
});    

Route::prefix('training')->group(function () {
   
    Route::get('/', function(){
    return 'training home page';
    });

    Route::get('HR', function(){
    return 'HR home page';
    });

    Route::get('ICT', function(){
    return 'ICT home page';
    });

    Route::get('markting', function(){
    return 'markting home page';
    });

    Route::get('logistics', function(){
    return 'logistics home page';
    });
});  

// ----------session3---------------------------------------------------------------------------------------------------

Route::get('cv', function(){
    return view('cv');
    });

Route::get('login', function(){
      return view('login');
      });
  
Route::post('receive', function(){
        return "Data receive";
        })->name('receive') ;   

Route::get('test1', [ExampleController::class, 'test1']);

// ---------------task3-------------------------------------------------------------------------------------------------


// // This route is to display addCar page (in views/addCar.blade.php) that has been taken from the function addcarpage in AddCar controller 
// Route::get('addCar', [AddCar::class, 'AddCarPage']);
// // This route is to display the data taken from the route addCar by the (request) in AddCar controller task3 function
// Route::post('showAddCar', [AddCar::class, 'task3'])->name('showAddCar');


// // ------------Session4------------------------------------------------------------------------------------

Route::get('addCar', [CarController::class, 'create']);
Route::post('storeCar',[CarController::class, 'store'])->name('storeCar');

// // ----------------task 4--------------------------------------------------------------------------------------------------


Route::get('addNews', [NewsController::class, 'create']);
Route::post('News', [NewsController::class, 'store'])->name('News');

// --------------------session 5 $ 6------------------------------------------------------

Route::get('cars', [CarController::class, 'index']);
Route::get('editCar/{id}', [CarController::class, 'edit']);
Route::put('updateCar/{id}', [CarController::class, 'update'])->name('updateCar');

    // ------Task 6 show car -----------------------------------------
Route::get('carDetails/{id}', [CarController::class, 'show'])->name('carDetails');
Route::get('deleteCar/{id}', [CarController::class, 'destroy']);


// --------------task 5-----------------------------------------------------------------------------------------------------------

Route::get('news', [NewsController::class, 'index']);
Route::get('editNews/{id}', [NewsController::class, 'edit']);
Route::put('updateNews/{id}', [NewsController::class, 'update'])->name('updateNews');


// --------------Task 6 show news---------------------------------------------------------------------------------------------------

Route::get('newsDetails/{id}', [NewsController::class, 'show'])->name('newsDetails');
Route::get('deleteNews/{id}', [NewsController::class, 'destroy']);

// --------------Session 7----------------------------------------------------------------------------------------------------------

Route::get('trashedCar', [CarController::class, 'trashed']);
Route::get('restoreCar/{id}', [CarController::class, 'restore']);
Route::get('forceDelete/{id}', [CarController::class, 'forceDelete']);

// -------------Task7---------------------------------------------------------------------------------------------------------------

Route::get('trashedNews', [NewsController::class, 'trashed']);
Route::get('restoreNews/{id}', [NewsController::class, 'restore']);
Route::get('forceDeleteNews/{id}', [NewsController::class, 'forceDelete']);

// -------------------Ssseion8--------------------------------------------------------

Route::get('showUpload', [ExampleController::class, 'showUpload']);
Route::post('upload', [ExampleController::class, 'upload'])->name('upload');

// -------------------session9---------------------------------------------------------



Route::get('blog1',[ExampleController::class, 'blog1']);


// --------------task 9----------------------------------------------------------------

Route::get('place', [PlaceController::class, 'index']);
Route::get('addPlaces',[PlaceController::class, 'create']);
Route::post('storePlaces',[PlaceController::class, 'store'])->name('storePlaces');
Route::get('extendExplore',[PlaceController::class, 'explore'])->name('extendExplore');
Route::get('tours/{id}',[PlaceController::class, 'show'])->name('tours');

// ----------------Task 10----------------------------------------------------------------


Route::get('placeTable',[PlaceController::class, 'placeTable']);
Route::get('deletePlace/{id}', [PlaceController::class, 'destroy']);
Route::get('trashedPlace', [PlaceController::class, 'trashed']);
Route::get('restorePlace/{id}', [PlaceController::class, 'restore']);
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
