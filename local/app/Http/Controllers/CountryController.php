<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Country;
use App\Language;
use App\User;
use DB;
use Validator;
use Redirect;
use IMS;
class CountryController extends Controller {

	public $folder  = "country.";
	/*
	|---------------------------------------
	|@Showing all records
	|---------------------------------------
	*/
	public function index()
	{					
		$res = new Country;
		
		return View($this->folder.'index',['data' => $res->getAll(),'link' => 'country/']);
	}	
	
	/*
	|---------------------------------------
	|@Add new page
	|---------------------------------------
	*/
	public function show()
	{								
		return View($this->folder.'add',['data' => new Country,'form_url' => env('admin').'/country']);
	}
	
	/*
	|---------------------------------------
	|@Save data in DB
	|---------------------------------------
	*/
	public function store(Request $Request)
	{			
		$data = new Country;	
		
		$data->addNew($Request->all(),"add");
		
		return redirect(env('admin').'/country')->with('message','New Record Added Successfully.');
	}
	
	/*
	|---------------------------------------
	|@Edit Page 
	|---------------------------------------
	*/
	public function edit($id)
	{				
		return View($this->folder.'edit',['data' => Country::find($id),'form_url' => env('admin').'/country/'.$id]);
	}
	
	/*
	|---------------------------------------
	|@update data in DB
	|---------------------------------------
	*/
	public function update(Request $Request,$id)
	{	
		$data = new Country;

		$data->addNew($Request->all(),$id);
		
		return redirect(env('admin').'/country')->with('message','Record Updated Successfully.');
	}
	
	/*
	|---------------------------------------------
	|@Delete Data
	|---------------------------------------------
	*/
	public function delete($id)
	{
		Country::where('id',$id)->delete();

		return redirect(env('admin').'/country')->with('message','Record Deleted Successfully.');
	}
}