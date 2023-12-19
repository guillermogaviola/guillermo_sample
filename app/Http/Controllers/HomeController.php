<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeModel;

class HomeController extends Controller
{
    public function home()

    {
    	$data['getRecord'] = HomeModel::all();
        return view('frontend.home', $data);
    }

    public function about()
    {
    	return view('frontend.about');
    }

    public function class()
    {
    	return view('frontend.class');
    }

    public function teachers()
    {
        return view('frontend.teachers');
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function blog()
    {
        return view('frontend.pages.blog');
    }

    public function single()
    {
        return view('frontend.pages.single');
    }
}