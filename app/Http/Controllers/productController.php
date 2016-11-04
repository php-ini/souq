<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class productController extends Controller
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
	
	public function home()
    {
    	
		// $seconds = \App\second::where('pid', 7)->take(10)->get();
		// foreach($seconds as $second){
        // $count = $second->thirds->toArray();
		// echo"<pre>";print_r($count);
		// }
		//echo $count;
		// exit;
		// echo \Request::route()->getName();exit;
		
        return view('product.home');
    }
	
	
	public function quick_view(Request $request){
		$input = $request->all();
		$product = \App\third::where('id', $input['productItem'])->first();
		
		
		$product->views = $product->views + 1;
		$product->save();
		
		
		return view('product.quick_view', ['product' => $product]);
		
		// return view('product.quick_view');
	}
	
	
	public function category(Request $request, $name){
		
		$id = \App\settings::idFromSlug($name);
		$cats = \App\second::where('pid', $id)->get();
		$first = \App\first::where('id',$id)->first();
		 // \Request::route()->getName();exit;
		return view('product.category', ['id' => $id, 'categories' => $cats, 'first' => $first]);
	}
	
	public function group(Request $request, $name){
		
		$id = \App\settings::idFromSlug($name);
		$cats = \App\second::where(['id'=> $id])->first();
		
		$second = \App\second::where(['pid'=> $cats->pid, 'group_id' => $cats->group_id])->get();
		
		return view('product.group', ['id' => $id, 'second' => $second, 'cat' => $cats]);
	}
	
	
	public function products(Request $request, $name){
		
		$input = $request->all();
		if(isset($input['sort'])){
			$sor = explode("-", $input['sort']);
			$sort = $sor[0];
			$sort_type = $sor[1];
		}else{
			$sort = "date";
			$sort_type = "desc";
		}
		$id = \App\settings::idFromSlug($name);
		$products = \App\third::where('sid', $id)->where('qty', '>', 0)->where('status_id', 2)->orderBy($sort, $sort_type)->paginate(10);
		$second = \App\second::where('id',$id)->first();
		 // \Request::route()->getName();exit;
		 // echo \Route::getFacadeRoot()->current()->uri();exit;
		 // echo \Request::fullUrl();exit;
		 // echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];exit;
		 
		 $filter['sort'] = $sort;
		 $filter['sort_type'] = $sort_type;
		 $filter['colors'] = [];
		 $min = \DB::table('thirdlevel')->select(\DB::raw('min(price) as min_price'))->where('sid', $id)->where('qty', '>', 0)->where('status_id', 2)->first();
		 $filter['min_price'] = $min->min_price;
		 $max = \DB::table('thirdlevel')->select(\DB::raw('max(price) as max_price'))->where('sid', $id)->where('qty', '>', 0)->where('status_id', 2)->first();
		 $filter['max_price'] = $max->max_price;
		 $filter['sel_min_price'] = $min->min_price;
		 $filter['sel_max_price'] = $max->max_price;
		 
		 $filter['sizes'] = [];
		 
		 // echo"<pre>";print_r($filter);exit;
		 
		return view('product.products', ['id' => $id, 'products' => $products, 'second' => $second,
		'sort' => $sort, 'sort_type' => $sort_type, 'slug' => $name, 'filter' => $filter]);
	}
	
	public function product(Request $request, $name){
		
		$id = \App\settings::idFromSlug($name);
		$product = \App\third::where('id', $id)->first();
		
		// echo $product->second->first->title;exit;
		
		$product->views = $product->views + 1;
		$product->save();
		
		// echo $product->views;exit;
		return view('product.product', ['product' => $product]);
	}
	
	
	
	
	public function productFilter(Request $request, $name){
		$input = $request->all();
		// echo"<pre>";print_r($input);exit;
		$color = isset($input['color']) ? implode(",",$input['color']): "";
		$size = isset($input['size']) ? implode(",", $input['size']): "";
		$brand = isset($input['brand']) ? implode(",",$input['brand']): "";
		$redirect = "/products/" . $name . "/price:" . $input['min_price'] . "," . $input['max_price']
					. "/color:" . $color . "/brand:" . $brand . "/size:" . $size;
		
		return redirect($redirect);
		echo $redirect . "<br>";
		echo"<pre>";print_r($input);exit;
	}


	public function productRedirect(Request $request, $name, $price = null, $color = null, $brand = null, $size = null){
		$input = $request->all();
		$price = str_replace("price:", "", $price);
		$color = str_replace("color:", "", $color);
		$brand = str_replace("brand:", "", $brand);
		$size = str_replace("size:", "", $size);
		// echo $size;exit;
		
		$id = \App\settings::idFromSlug($name);
		// $products = \App\third::where('sid', $id)->orderBy($sort, $sort_type)->paginate(10);
		$products = \App\third::where('sid', $id);
		$second = \App\second::where('id',$id)->first();
		
		$min = \DB::table('thirdlevel')->select(\DB::raw('min(price) as min_price'))->where('sid', $id)->where('qty', '>', 0)->where('status_id', 2)->first();
		$filter['min_price'] = $min->min_price;
		$max = \DB::table('thirdlevel')->select(\DB::raw('max(price) as max_price'))->where('sid', $id)->where('qty', '>', 0)->where('status_id', 2)->first();
		$filter['max_price'] = $max->max_price;
		 
		if(isset($input['sort'])){
			$sor = explode("-", $input['sort']);
			$sort = $sor[0];
			$sort_type = $sor[1];
		}else{
			$sort = "date";
			$sort_type = "desc";
		}
		$filter['sort'] = $sort;
		$filter['sort_type'] = $sort_type;
		
		if($price != ""){
			
			$pr = explode("," ,$price);
			$products->where('price', '>=' ,$pr[0]);
			$products->where('price', '<=' ,$pr[1]);
			$filter['sel_min_price'] =  $pr[0];
			$filter['sel_max_price'] =  $pr[1];
			
		}else{
			$price = "";
			$filter['sel_min_price'] = $filter['min_price'];
			$filter['sel_max_price'] = $filter['max_price'];
		}
		
		if($color != ""){
			// $products->whereIn('color', 'select id from product_color where product_id = ' . $id .' and color_id IN('.$color . ')');
			$products->whereIn('id', function($query) use ($color, $id){
				$query->select('product_id')
				->from('product_color')
				->whereIn('color_id', explode(",", $color))
				->where('sid', $id);
			});
			
			// $products->whereIn('color', explode(",",$color));
			$filter['color'] =  explode(",",$color);
		}else{
			$filter['color'] = [];
		}
		if($size != ""){
			
			$products->whereIn('id', function($query) use ($size, $id){
				$query->select('product_id')
				->from('product_size')
				->whereIn('size_id', explode(",", $size))
				->where('sid', $id);
			});
			
			// $products->whereIn('size', explode(",",$size));
			$filter['size'] =  explode(",",$size);
		}else{
			$filter['size'] = [];
		}
		if($brand != ""){
			
			$products->whereIn('brand', explode(",",$brand));
			$filter['brand'] =  explode(",",$brand);
		}else{
			$filter['brand'] = [];
		}
		
		$products = $products->where('qty', '>', 0)->where('status_id', 2)->orderBy($sort, $sort_type)->paginate(10);
		// \DB::enableQueryLog();
		return view('product.products', ['id' => $id, 'products' => $products, 'second' => $second,
		'sort' => $sort, 'sort_type' => $sort_type, 'slug' => $name, 'filter' => $filter]);
		echo $color;
		echo"<pre>";print_r($input);exit;
	}




	public function brand(Request $request, $name){
		
		$input = $request->all();
		if(isset($input['sort'])){
			$sor = explode("-", $input['sort']);
			$sort = $sor[0];
			$sort_type = $sor[1];
		}else{
			$sort = "date";
			$sort_type = "desc";
		}
		
		$brand = \App\brands::where('title', $name);
		if($brand->count() > 0){
			$br = $brand->first();
			$id = $br->id;
			$prod = \App\third::where('brand', $br->id)->where('qty', '>', 0)->where('status_id', 2)->orderBy($sort, $sort_type)->paginate(10);
			return view('product.brand', ['id' => $id,'brand' => $br, 'products' => $prod, 'sort' => $sort, 'sort_type' => $sort_type]);
		}else{
			return redirect('product.home');
		}
		
	}

	
	
	public function search(Request $request, $name){
		
		$input = $request->all();
		if(isset($input['sort'])){
			$sor = explode("-", $input['sort']);
			$sort = $sor[0];
			$sort_type = $sor[1];
		}else{
			$sort = "date";
			$sort_type = "desc";
		}
		
		$products = \App\third::where('title' , 'like', '%'.$name.'%')->orWhere('title_ar' , 'like', '%'.$name.'%')
		->orWhere('description' , 'like', '%'.$name.'%')->orWhere('description_ar' , 'like', '%'.$name.'%')
		->orWhere('code' , 'like', '%'.$name.'%')->where('qty', '>', 0)->where('status_id', 2)
		->orderBy($sort, $sort_type)->paginate(10);
		
		 
		 
		 
		 // echo"<pre>";print_r($filter);exit;
		 
		return view('product.search', ['products' => $products,
		'sort' => $sort, 'sort_type' => $sort_type, 'slug' => $name]);
	}
	
	
	public function sitemap(){
		return view('product.sitemap');
	}
	
	
	public function addTo(Request $request){
		
		$input = $request->all();
		// $request->session()->forget($input['type']);exit;
		// $request->session()->flush();
		// $request->session()->save();exit;
		// echo"<pre>";print_r($request->session()->all());exit;
		
		
		$saved = $request->session()->get($input['type'], []);
		// $saved = $request->session()->all();
		// print_r($saved);exit;
		if(count($saved) > 0){
			// $arr = array_push($saved, $input['productId']);
			$request->session()->push($input['type'], $input['productId']);
			$arr = $request->session()->get($input['type'], []);
		}else{
			$arr = [$input['productId']];
		}
		// print_r($arr);exit;
		
		$result = array_unique($arr);
		
		$request->session()->put($input['type'] , $result);
        $request->session()->save();
		
		$res['status'] = "success";
		$res['type'] = $input['type'];
		$res['count'] = count($request->session()->get($input['type']));
		
		$total_price = 0;
		foreach($request->session()->get($input['type']) as $one){
			$prod = \App\third::where('id', $one)->first();
			$total_price += $prod['price'];
		}
		$res['total'] = $total_price;
		
		return \Response::json($res);
		// echo"<pre>";print_r($request->session()->all());exit;
	}

	public function getCart(Request $request){
		
		return view('layouts.cart');
	}

	public function removeCart(Request $request){
		
		$input = $request->all();
		
		
		
		
		$productId = $input['productId'];
		
		$id = array_search($productId, $request->session()->get('cart'));
		$request->session()->forget('cart.'. $id);
		
		// $saved = $request->session()->get('cart', []);
		
		// $request->session()->put('cart' , $saved);
        $request->session()->save();
		
		
		$saved = $request->session()->get('cart');
		// echo "<pre>";print_r($saved);exit;
		
		$res['status'] = "success";
		$res['type'] = $input['type'];
		$res['count'] = count($request->session()->get($input['type']));
		
		$total_price = 0;
		foreach($request->session()->get('cart') as $one){
			$prod = \App\third::where('id', $one)->first();
			$total_price += $prod['price'];
		}
		$res['total'] = $total_price;
		
		return \Response::json($res);
		// echo"<pre>";print_r($request->session()->all());exit;
	}
	
	
	public function compare(Request $request){
		$input = $request->all();
		$wish = count($request->session()->get('compare')) > 0 ? $request->session()->get('compare') : [];
		
		$wishh = array_slice($wish, -3, 3, true);
		
		$prods = \App\third::whereIn('id', $wishh)->get();
		return view('product.compare', ['products' => $prods]);
	}
	
	
	public function wishlist(Request $request){
		$input = $request->all();
		$wish = count($request->session()->get('wish')) > 0 ? $request->session()->get('wish') : [];
		
		// $wishh = array_slice($wish, -3, 3, true);
		
		
		if(isset($input['sort'])){
			$sor = explode("-", $input['sort']);
			$sort = $sor[0];
			$sort_type = $sor[1];
		}else{
			$sort = "date";
			$sort_type = "desc";
		}
		
		// $products = \App\third::where('title' , 'like', '%'.$name.'%')->orWhere('title_ar' , 'like', '%'.$name.'%')
		// ->orWhere('description' , 'like', '%'.$name.'%')->orWhere('description_ar' , 'like', '%'.$name.'%')
		// ->orderBy($sort, $sort_type)->paginate(10);
		
		 
		 $products = \App\third::whereIn('id' , $wish)
		 ->orderBy($sort, $sort_type)->paginate(10);
		 
		 // echo"<pre>";print_r($wish);exit;
		 
		return view('product.wishlist', ['products' => $products,
		'sort' => $sort, 'sort_type' => $sort_type]);
		
		
		// return view('product.wishlist');
	}
	
	
	public function contact(){
		return view('product.contact');
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
