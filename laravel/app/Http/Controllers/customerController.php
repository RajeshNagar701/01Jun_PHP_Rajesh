<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\country;
use Illuminate\Http\Request;

use Hash;
use Session;
use Alert;


//load created mail file
use App\Mail\signupemail;
use Mail;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    function login()
	{
		return view('website/login'); 
	}
	
	function login_auth(Request $request)
	{
		
		$validated = $request->validate([
        'username' => 'required|email',
        'password' => 'required',
		]);
		
		$data=customer::where('username','=',$request->username)->first();
		if($data)
		{
			if(Hash::check($request->password,$data->password))
			{
				// session create
				session()->put('userid',$data->id);
				session()->put('name',$data->name);
				
				// use session => session('name') / // session()->get('name')
				
				Alert::success('Congrats', 'You\'ve Successfully Login');
				return redirect('/');
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
		session()->pull('userid');
		session()->pull('name');
		Alert::success('Congrats', 'You\'ve Successfully Logout');
		return redirect('/');
		
	}
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data=country::all();
        return view('website/signup',['country'=>$data]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		/*
		$validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
		'username' => 'required|unique:customers',
		'password' => 'required|mix:4|max:12',
		'mobile' => 'required|digit|min:10|max:10',
		'cid' => 'required',
		'file' => 'required|image'
		]);
		*/
		
        $data=new customer;
  $namemail=$data->name=$request->name;
  $email=$data->email=$request->email;
		$data->username=$request->username;
		$data->password=Hash::make($request->password);
		$data->gen=$request->gen;
		$data->lag=implode(",",$request->lag);
		$data->mobile=$request->mobile;
		$data->cid=$request->cid;
		
		//img upload
		$file=$request->file('file');		
		$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
		$file->move('upload/customer/',$filename);  // use move for move image in public/images		
		$data->file=$filename;
		

		$data->save();
		
		$maildata=array("namemail"=>$namemail);
		
		Mail::to($email)->send(new signupemail($maildata));
		
		Alert::success('Congrats', 'You\'ve Successfully Registered');
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
		//$data=customer::all(); // get all custome data
        $data=customer::join('countries','customers.cid','=','countries.id')->get(['customers.*','countries.cnm']);
		return view('admin/manage_cust',['data_customer'=>$data]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    
	public function profile(customer $customer)
    {
		$data=customer::where('id',session('userid'))->first();
        return view('website/profile',['data'=>$data]);
    }
	public function edit(customer $customer,$id)
    {
		$countrydata=country::all();
        $data=customer::find($id);
        return view('website/editprofile',['country'=>$countrydata,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer,$id)
    {
        $data=customer::find($id);
		$data->name=$request->name;
		$data->email=$request->email;
		$data->username=$request->username;
		$data->gen=$request->gen;
		$data->lag=implode(",",$request->lag);
		$data->mobile=$request->mobile;
		$data->cid=$request->cid;
		
		//img upload
		if($request->hasFile('file'))
		{	
			$old_img=$data->file;
			unlink('upload/customer/'.$old_img);
	
			$file=$request->file('file');		
			$filename=time().'_img.'.$request->file('file')->getClientOriginalExtension();
			$file->move('upload/customer/',$filename);  // use move for move image in public/images		
			$data->file=$filename;
		}	
		$data->update();
		Alert::success('Congrats', 'You\'ve Successfully Upadted');
		return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer,$id)
    {
		// get id data img
		$data=customer::find($id);  // get only one data in string 
		$filename=$data->file;
		
		// data delete with unlink image
        customer::find($id)->delete();
		if($filename!="")
		{
			unlink('upload/customer/'.$filename);
		}
		Alert::success('Congrats', 'You\'ve Successfully Deleted');
		return redirect()->back();
    }
}
