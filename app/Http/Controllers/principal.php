<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;

class principal extends Controller
{
    public function index(){
      return view('index');

    }
}
