<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

use Alert;
use Hash;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/index'); 
    }

	function login_auth(Request $request)
	{
		$validated = $request->validate([
        'username' => 'required|email',
        'password' => 'required',
		]);
		
		
		$data=admin::where('username','=',$request->username)->first();
		if($data)
		{
			if(Hash::check($request->password,$data->password))
			{
				// session create
				session()->put('adminid',$data->id);
				session()->put('adminname',$data->username);
				
				// use session => session('name') / // session()->get('name')
				
				Alert::success('Congrats', 'You\'ve Successfully Login');
				return redirect('/dashboard');
			}
			else
			{
				Alert::error('Failed', 'Wrong Password ');
				return redirect()->back();	
			}
		}
		else
		{
			Alert::error('Failed', 'Wrong Email ');
			return redirect()->back();
		}
		
	}
	
	function logout()
	{
		// session delete
		session()->pull('adminid');
		session()->pull('adminname');
		Alert::success('Congrats', 'You\'ve Successfully Logout');
		return redirect('/admin-login');
		
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
