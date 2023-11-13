<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
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
});*/
Route::get('/', function () {
    return view('welcome');
});

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
    return 'HR';
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



