<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

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
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
}
