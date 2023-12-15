<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HomeModel;
use Str;

class DashboardController extends Controller
{
    public function dashboard()
    {
    	return view('backend.dashboard');
    }

    public function home()
    {
    	$data['getRecord'] = HomeModel::all();
    	return view('backend.home.list', $data);
    }
     public function post(Request $request)
    {
    	// dd($request->all());
    	// return view('backend.home.post');
    	if($request->add_to_update == "Add"){

    		$insertRecord  =  request()->validate([
    			'profile' => 'required'
    		]);

			$insertRecord =  new HomeModel;
    	}
    	else{
    		$insertRecord =  HomeModel::find($request->id);
    	}
    	$insertRecord                  =  new HomeModel;
    	$insertRecord->your_name       = trim($request->your_name);
    	$insertRecord->work_experience = trim($request->work_experience);
    	$insertRecord->description     = trim($request->description);

    	if(!empty($request->file('profile'))){

    		if(!empty($insertRecord->profile) && file_exists('public/img/'. $insertRecord->profile))
			{
				unlink('public/img/'. $insertRecord->profile);
			}

    		$file                    = $request->file('profile');
    		$randomStr               = Str::random(30);
    		$filename                = $randomStr .  '.' . $file->getClientOriginalExtension();
    		$file->move('public/img/',$filename);
    		$insertRecord->profile   = $filename;
    	}

    	$insertRecord->save();

    	return redirect()->back()->with('success', "Homepage Successfully Save.");
    }
}
