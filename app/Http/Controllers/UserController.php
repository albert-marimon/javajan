<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function prueba(Request $request){
    	return "test USER CONTROLLER";
    }
}
