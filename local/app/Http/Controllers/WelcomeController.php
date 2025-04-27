<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Welcome;
use App\Language;
use App\User;
use DB;
use Validator;
use Redirect;
use IMS;
class WelcomeController extends Controller {

	public $folder  = "welcome.";
	/*
	|---------------------------------------
	|@Showing all records
	|---------------------------------------
	*/
	public function index()
	{					
		$res = new Welcome;
		
		return View($this->folder.'index',['data' => $res->getAll(),'link' => 'welcome/']);
	}	
	
	/*
	|---------------------------------------
	|@Add new page
	|---------------------------------------
	*/
	public function show()
	{								
		return View($this->folder.'add',['data' => new welcome,'form_url' => env('admin').'/welcome']);
	}
	
	/*
	|---------------------------------------
	|@Save data in DB
	|---------------------------------------
	*/
	public function store(Request $Request)
	{			
		$data = new Welcome;	
		
		$data->addNew($Request->all(),"add");
		
		return redirect(env('admin').'/welcome')->with('message','New Record Added Successfully.');
	}
	
	/*
	|---------------------------------------
	|@Edit Page 
	|---------------------------------------
	*/
	public function edit($id)
	{				
		return View($this->folder.'edit',['data' => Welcome::find($id),'form_url' => env('admin').'/welcome/'.$id]);
	}
	
	/*
	|---------------------------------------
	|@update data in DB
	|---------------------------------------
	*/
	public function update(Request $Request,$id)
	{	
		$data = new Welcome;

		$data->addNew($Request->all(),$id);
		
		return redirect(env('admin').'/welcome')->with('message','Record Updated Successfully.');
	}
	
	/*
	|---------------------------------------------
	|@Delete Data
	|---------------------------------------------
	*/
	public function delete($id)
	{
		$res = Welcome::find($id);

		unlink("upload/welcome/".$res->img);

		$res->delete();

		return redirect(env('admin').'/welcome')->with('message','Record Deleted Successfully.');
	}

	public function status($id)
	{
		$res 			= Welcome::find($id);
		$res->status 	= $res->status == 0 ? 1 : 0;
		$res->save();

		return redirect(env('admin').'/welcome')->with('message','Record Deleted Successfully.');
	}
}