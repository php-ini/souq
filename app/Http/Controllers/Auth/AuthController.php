<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;


use Socialite;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
	protected $loginPath = '/login';
	protected $redirectPath = '/';
	
	// protected $username = 'username';
	
	
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
		view()->share('cart_onfly', count($request->session()->get('cart')));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'username' => 'required|string|max:255|unique:members',
            'email' => 'required|email|max:255|unique:members',
            'password' => 'required|confirmed|min:6',
            'address' => 'required|string|max:255',
        ]);
    }
	
	public function postRegister_(Request $request)
    {
        // call the RegistersUsers::postRegister method
        // hold onto the return value for later
        $redirect = $this->register($request);

        $user = $request->user();

        //mail($user->email, 'Welcome to Hala!', 'You have created new account successfully !');

        return redirect('/success');
    }
	
	
	
	public function postRegister(Request $request){
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
		$input = $request->all();
		$user = $this->create($request->all());
        // \Auth::login();
		
		// \Auth::loginUsingId($user->id);
		return redirect('/success');
		
		
		
		if (\Auth::attempt(['email' => $input['email'], 'password' => $input['password'], 'status' => 1])) {
		    // The user is active, not suspended, and exists.
		    return redirect('/success');
		}
		return redirect('/success');
        // return redirect('/success');
    }
	
	
	/*
	public function postLogin(Request $request){
		// dd($request->all());
		$input = $request->all();
		$email = $input['email'];
		$password = $input['password'];
		
		// dd($request->session());
		// die(bcrypt($password));
		// dd(User::where('password', bcrypt($password))->count());
		if (\Auth::attempt(['email' => $email, 'password' => $password])) {
				
				
			\Auth::login(User::where('email', $email)->first());
				
				
			// dd(\Auth::user());
			// \Auth::loginUsingId(16);
            // Authentication passed...
            return redirect()->intended('/');
        }else{
        	dd($input);
        }
	}
	*/
	




public function postLogin(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email', 'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (\Auth::attempt($credentials, $request->has('remember')))     {
        \Session::flash('message', 'You are now logged in.');
        \Session::flash('status', 'success');

$some_name = session_name("pororom_user");
session_set_cookie_params(0, '/', '.pororom.com');
session_start();

$_SESSION['uid'] = \Auth::user()->id;



        return redirect("/");
    }
    return redirect($this->loginPath())
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => $this->getFailedLoginMessage(),
                ]);
}	

	

	public function success(){
		return view('auth.success');	
	}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'mobile' => $data['mobile'],
            'status' => 1,
            
        ]);
    }
	
	
	
	
	
	
	
	
	
	
	
	public function redirectToProvider($provider)
    {
    	// die("Under Testing");
    	if($provider == "facebook"){
        	return Socialite::driver($provider)->fields([
	            'first_name', 'last_name', 'email', 'gender', 'birthday'
	        ])->scopes([
	            'email', 'user_birthday'
	        ])->redirect();
		}else{
        	return Socialite::driver($provider)->redirect();
		}
    }
    
     public function handleProviderCallback($provider)
    {
     //notice we are not doing any validation, you should do it
		if($provider == "facebook"){
        $user = Socialite::driver($provider)->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->user();
		$data = [
            'fname' => $user->user['first_name'],//$user->getName(),
            'lname' => $user->user['last_name'],//$user->getName(),
            'dob' => isset($user->user['birthday']) ? date("Y-m-d",strtotime($user->user['birthday'])) : "",//$user->getName(),
            'email' => $user->email,
            'gender' => $user->user['gender'] == "male" ? 1 : 2,
            'login_type' => 'facebook'
        ];
		}elseif($provider == "twitter"){
			$user = Socialite::driver($provider)->user();
			$name = explode(" ", $user->name);
			$data['fname'] = $name[0];
			$data['lname'] = $name[1];
			$data['email'] = $user->email;
			$data['login_type'] = 'twitter';
			
		}elseif($provider == "google"){
			$user = Socialite::driver($provider)->user();
			$name = explode(" ", $user->user['displayName']);
			$data['fname'] = $name[0];
			$data['lname'] = $name[1];
			$data['email'] = $user->email;
			$data['login_type'] = 'google';
			
		}else{
			$user = Socialite::driver($provider)->user();
			$data = $user;
		}
		// echo $user->first_name;
        // echo"<pre>";print_r($user);exit;
		// $name = explode(" ", $user->getName()); 
        // stroing data to our use table and logging them in
        
        if(User::where('email', $data['email'])->count() > 0){
        	$user = User::where('email', $data['email'])->first();
        }else{
        	$user = User::firstOrCreate($data);
        }
     	
        \Auth::login($user);

        //after login redirecting to home page
        return redirect($this->redirectPath());
    }


}
