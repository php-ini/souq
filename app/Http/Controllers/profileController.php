<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use Auth;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request){
    	view()->share('image_url', 'http://perfectteamwork.com/');
		view()->share('currency', 'ريال');
		view()->share('cart_onfly', count($request->session()->get('cart')));
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


	
	public function cart(Request $request){
		$cart = $request->session()->get('cart', []);
		// echo"<pre>";print_r($cart);exit;
		$products = \App\third::whereIn('id', $cart)->get();
		return view('auth.checkout', ['cart' => $cart, 'products' => $products]);
	}
	
	public function getInfo(Request $request){
		$input = $request->all();
		$type = $input['type'];
		
		if($type == "getCities"){
			$id = $input['stateId'];
			$column = 'state_id';
			$data = \App\city::where($column, $id)->get();
		}elseif($type == "getStates"){
			$id = $input['countryId'];
			$column = 'country_id';
			$data = \App\state::where($column, $id)->get();
		}else{
			$json['msg'] = 'Countries';
			$json['status'] = 'success';
			$json['tp'] = 1;
			foreach(\App\country::all() as $one){
				$json['result'][$one->id] = $one->name;
			}
			return response()->json($json);
		}
		
		
		$json['msg'] = $type;
		$json['status'] = 'success';
		$json['tp'] = 1;
			
		foreach($data as $one){
			$json['result'][$one->id] = $one->name;
		}
		return response()->json($json);
	}
	
	
	public function checkoutStore(Request $request){
		// dd($request->all());
		$input = $request->all();
		if($input['addressRadio'] == '-'){
		$addr['member_id'] = Auth::user()->id;
		$addr['city_id'] = @$input['city'];
		$addr['state_id'] = $input['state'];
		$addr['country_id'] = $input['country'];
		$addr['address'] = $input['address'];
		$addr['tel'] = $input['tel'];
		$addr['mobile'] = $input['mobile'];
		
		$address = \App\address::create($addr);
		}else{
			$address = \App\address::where('id', $input['addressRadio'])->first();
		}
		
		$qty = 0;
		$total_price = 0;
		$delivery = 0;
		$i = 0;
		foreach($input['product'] as $pro){
			$line[$i]['qty'] = $input['qty-' . $pro];
			$line[$i]['product_id'] = $pro;
			$line[$i]['unit_price'] = \App\third::where('id', $pro)->first()->price;
			$line[$i]['ship_fees_per_unit'] = \App\third::where('id', $pro)->first()->ship_fees;
			$line[$i]['total_price'] = \App\third::where('id', $pro)->first()->price * $input['qty-' . $pro];
			$line[$i]['color_id'] = @$input['prod-' . $pro . '-color'];
			$line[$i]['size_id'] = @$input['prod-' . $pro . '-size'];
			
			$qty += $input['qty-' . $pro];
			$total_price += $line[$i]['total_price'];
			$delivery += $line[$i]['ship_fees_per_unit'] * $line[$i]['qty'];
			$i++;
		}
		
		$ord['member_id'] = Auth::user()->id;
		$ord['address_id'] = $address->id;
		$ord['qty'] = $qty;
		$ord['delivery_fees'] = $delivery;//\App\settings::where('name', 'Delivery Fees')->first()->value;
		$ord['price'] = $total_price + $ord['delivery_fees'];
		$ord['status'] = 1;
		$ord['currency_code'] = "SAR";
		// echo"<pre>";print_r($line);print_r($ord);exit;
		
		$order = \App\order::create($ord);
		
		$i = 0;
		foreach($line as $ll){
			$lines[$i] = $ll;
			$lines[$i]['order_id'] = $order->id;
			$i++;
		}

		$orderLine = \App\orderline::insert($lines);
		
		$request->session()->forget('cart');
		
		Session::flash('message', 'تم اكمال الشراء بنجاح .. سوف يقوم فريق العمل بالمتابعة معك حتى وصول طلبك .. ');
		return redirect('orderComplete/' . $order->id);
		
	}

	public function orderComplete(Request $request, $id){
		if(\App\order::where('id', $id)->where('member_id', Auth::user()->id)->count() > 0){
			return view('auth.orderComplete', ['order' => \App\order::where('id', $id)->first()]);
		}else{
			return redirect('/');
		}
	}
	
	
	
	
	
	
	public function myOrders(Request $request){
		$orders = \App\order::where('member_id', Auth::user()->id)->orderBy('id','desc')->paginate(10);
		
		return view('auth.orders', ['orders' => $orders]);
	}
	
	public function myAddress(Request $request){
		$addresses = \App\address::where('member_id', Auth::user()->id)->orderBy('id','desc')->paginate(10);
		
		return view('auth.address', ['addresses' => $addresses]);
	}  
	
	
	public function deleteAddress(Request $request, $id){
		$input = $request->all();
		\App\address::destroy($id);
		
		Session::flash('message', 'تم مسح العنوان المحدد بنجاح');
		return redirect('myAddress');
	}



	public function newsletter(Request $request){
		$input = $request->all();
		$news = $input['newsletter'];
		if(\DB::table('newsletters')->where('email', $news)->count() == 0){
			\DB::table('newsletters')->insert(['email' => $news]);
			$arr['status'] = "success";
		}else{
			$arr['status'] = "failed";
		}
		return response()->json($arr);
		echo"<pre>";print_r($input);exit;
	}

	public function google(){
		die("google-site-verification: google80dc3a28d61d7b05.html");
	}

	public function check_user(Request $request){

	if(Auth::check()){
	$arr['success'] = "true";
	$arr['uid'] = \Auth::user()->id;
	}else{
	$arr['success'] = "false";
	}
//echo \Session::getId();
	return response()->json($arr);
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
