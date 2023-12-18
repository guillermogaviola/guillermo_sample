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

    public function panel_home(Request $request)
    {
    	$data['getRecord'] = HomeModel::all();
    	return view('backend.home.list', $data);
    }

    public function panel_home_post(Request $request)
    {

        if($request->add_to_update == "add") {

            $insertRecord  =  request()->validate([
                'profile' => 'required'
            ]);
            
            $insertRecord =  new HomeModel;

        }else{
            $insertRecord = HomeModel::find($request->id);

        }


    	
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
