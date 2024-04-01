<?php

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function index(){
        $some = "Тест";
        function getValue(){
            global $some;
            echo $some;
        }
        getValue();
    }
}
