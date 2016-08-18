<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Validator;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
    	view()->share('image_url', 'http://perfectteamwork.com/');
		view()->share('currency', 'ريال');
    }
    public function index()
    {
        //
    }
	
	public function profile(){
		$user = \Auth::user();
		// var_dump($user);exit;
		return view('auth.profile', ['user' => $user]);
	}
	
	public function postProfile(Request $request){
		$input = $request->all();
        if($this->is_valid($request , $v) === false){
            return redirect('profile')
                        ->withErrors($v)
                        ->withInput();
        }
		$user = \App\User::findOrFail(\Auth::user()->id);
		$user->update($input);
		
		Session::flash('message', 'تم حفظ بيانات الحساب بنجاح !');
		return redirect('/profile');
	}
	
	
	
	
	 public function is_valid($request , &$v, $id=null){
        
        $input = $request->all();
        
        
            $v = Validator::make($request->all(), [
	            'fname' => 'required|max:255',
	            'lname' => 'required|max:255',
	            
	            'email' => 'required|email|max:255|unique:members,id,' . \Auth::user()->id,
	            'password' => $input['password'] ? 'required|confirmed|min:6' : '',
	            'address' => 'required|string|max:255',
	        ]);
        
            if ($v->fails())
            {
                return false;
            }else { return true; }
    }
	 
	 
	
	
	public function about(Request $request){
		
		// if(\DB::table('crud')->where('type', \Request::route()->getName())->count() == 0){
			// abort(404);
		// }
		if(\Request::route()->getName() == "about"){
			$id = 24;
		}elseif(\Request::route()->getName() == "delivery"){
			$id = 34;
		}elseif(\Request::route()->getName() == "privacy"){
			$id = 40;
		}elseif(\Request::route()->getName() == "terms"){
			$id = 33;
		}elseif(\Request::route()->getName() == "returns"){
			$id = 29;
		}elseif(\Request::route()->getName() == "careers"){
			$id = 41;
		}elseif(\Request::route()->getName() == "about5565"){
			
		}else{
			aboty(404);
		}
		$about = \DB::table('crud')->where(['id' => $id])->first();
		return view('about', ['about' => $about, 'id' => $id]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
