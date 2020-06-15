<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function hello(){
        echo date("Y-m-d h:i:s");
    }
}
