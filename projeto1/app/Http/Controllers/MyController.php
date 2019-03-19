<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function getName() {
        return "<H1>My first controller</H1>";
    }
}
