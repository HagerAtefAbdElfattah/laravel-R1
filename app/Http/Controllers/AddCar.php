<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddCar extends Controller
{
    public function AddCarPage(){
        return view("addcar");
    }


    public function task3(){

       $title = request("title");
       $price = request("price");
       $description = request("description");
       $publish = request("remember");
       if ($publish) {
        $strpublish = "cheched";
       }else {
        $strpublish = "";
       }
       if ($strpublish == "cheched") {
        $showPublish = " and you choose to publish it ";
       }else {
        $showPublish = "and you choose NOT to publish it";
       }
       return 'The car title is '.$title.' and the price is '. $price. " and it's description is ". $description . $showPublish;
       }
}
