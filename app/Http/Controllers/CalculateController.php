<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    var $price;

    //
    public function __construct() {
        $this->price = $this->setPrice();
    }

    public function index() { 
        return view('calculate');
    }

    public function calculate(Request $request) {
        
        $inputArr = $request->all();

        $totalPrice = 0;
        foreach($inputArr as $key => $val) {

            if(in_array($key,["Orange","Pink","Green"])) {

                $totalPrice += $this->calculateBundle($this->price[$key],$val);

            } else {

                if(isset($this->price[$key])) {
                    $totalPrice += $this->price[$key] * $val;
                };

            }
            
        } 

        //Deduc 10% if isMember
        if(isset($inputArr['isMember'])) {
            $totalPrice = $totalPrice * 0.9;
        }

        return ['price' => $totalPrice]; 

        //return view('calculate', ['totalPrice' => $totalPrice]);

    }

    private function calculateBundle($price_per_item , $item_count) {

        if($item_count == 0) {
            return 0;
        }

        $result = ((($item_count - ($item_count % 2)) * $price_per_item) * 0.95) + (($item_count % 2) * $price_per_item);
        return $result;
    }

    private function setPrice() {

        $arr = [
            "Red" => 50,
            "Green" => 40,
            "Blue" => 30,
            "Yellow" => 50,
            "Pink" => 80,
            "Purple" => 90,
            "Orange" => 120
        ];

        return $arr;
    }
}
