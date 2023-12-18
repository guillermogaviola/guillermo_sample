<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeModel;

class HomeController extends Controller
{
    public function home()

    {
    	$data['getRecord'] = HomeModel::all();
        return view('home', $data);
    }
}