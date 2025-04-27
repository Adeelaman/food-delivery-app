<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Auth;
use App\Page;
use App\AppUser;
use App\Category;
use App\StripePayment;
use App\Text;
use App\Language;
use App\City;
use App\Cate;
use App\Slider;
use App\Store;
use App\Cart;
use App\CartCoupen;
use App\Offer;
use App\Order;
use App\Address;
use App\Rate;
use App\Delivery;
use App\User;
use App\Country;
use App\Welcome;
use App\UserLocation;
use App\Item;
use DB;
use Validator;
use Redirect;
use Excel;
class ApiController extends Controller {


	public function welcome()
	{
		$res  = new Welcome;
		
		return response()->json(['data' => $res->getAppData(0)]);
	}

	public function getStore()
	{
		$res  = new Store;
		$cate = new Category;
		
		return response()->json(['data' => $res->getAppData(),'cate' => $cate->getLang($_GET['category_id'])['name']]);
	}

	public function homepage()
	{
		$res     	= new Page;
		$text    	= new Text;
		$cate    	= new Cate;
		$slider  	= new Slider;
		$store   	= new Store;
		$country 	= new Country;
		$location 	= new UserLocation;
		$item 		= new Item;

		$location->addNew();

		$data = [

		'text'			=> $text->getAppData($_GET['lid']),
		'setting'		=> $this->setting(),
		'city'			=> City::find($_GET['city_id']),
		'category'  	=> $cate->getAppData(),
		'slider'		=> $slider->getAppData(0),
		'banner'		=> $slider->getAppData(1),
		'trend'			=> $store->getAppData(1),
		'random'		=> $store->getRandom(),
		'store'			=> $store->getAppData(),
		'count'			=> Cart::where('cart_no',$_GET['cart_no'])->count(),
		'running'   	=> Order::where('user_id',$_GET['user_id'])->whereIn('status',[0,1,3,4])->count(),
		'search_data'	=> $store->getSearchData(),
		'country'       => $country->getAppData(),
		'user'			=> isset($_GET['user_id']) && $_GET['user_id'] > 0 ? AppUser::find($_GET['user_id']) : null,
		'items'			=> $item->getRandomItem()
		

		];


		return response()->json(['data' => $data]);
	}

	public function city()
	{
		$res  = new City;
		
		return response()->json(['data' => $res->getAppData()]);
	}

	public function page()
	{
		$res  = new Page;
		
		return response()->json(['data' => $res->getAppData()]);
	}
	
	public function makeStripePayment()
	{
		$setting = $this->setting();
		$store   = isset($_GET['store_id']) && $_GET['store_id'] > 0 ? Store::find($_GET['store_id']) : new Store;
		$stripe_skey = $store->stripe_skey ? $stripe->stripe_skey : $setting->stripe_skey;

		$stripe  = Stripe::make($stripe_skey, '');

		try{

		$charge = $stripe->charges()->create([

				"amount" 		=> $_GET['amount'],
				"currency" 		=> $setting->currency_code,
				"source" 		=> $_GET['token'],
				"description" 	=> "Payment From Food App",

		]);

		$info 				= new StripePayment;
		$info->payment_id 	= $charge['id'];
		$info->amount 		= $_GET['amount'];
		$info->save();

		return response()->json(['data' => 'done','id' => $charge['id']]);

		}
		catch(\Exception $e){
			
		return response()->json(['data' => 'error','error' => "Something went wrong. Please try after sometime."]);

		}
	}

	public function userInfo()
	{	
		if(isset($_GET['type']) && $_GET['type'] == "delete")
		{
			AppUser::where('id',$_GET['id'])->delete();
			Order::where('user_id',$_GET['id'])->delete();
			Address::where('user_id',$_GET['id'])->delete();

			return response()->json(['data' => true]);
			exit;

		}

		$cart = new Cart;
		
		//Years for stripe
		$year = [];

		$x 	= date('Y');
		$next = date('Y') + 10;

		while($x <= $next) 
		{
		  array_push($year, $x);
		  $x++;
		} 

		//next 5 day dates for later orders
		$dates = [];
		$d     = date("d-M-Y");
		for($i = 1;$i<8;$i++)
		{
			array_push($dates,$d);

			$d = date('d-M-Y',strtotime(date('Y-m-d').' + '.$i.' days'));
		}

		//times
		$start 	= strtotime('08:00');
	    $end 	= strtotime('20:00');
	    $times  = [];

		for($i=$start;$i<=$end;$i = $i + 30*60)
		{
		    array_push($times,date('h:i A',$i));
		}

		return response()->json([

		'data' 		=> AppUser::find($_GET['id']),
		'address' 	=> Address::where('user_id',$_GET['id'])->get(),
		'store'		=> isset($_GET['store_id']) && $_GET['store_id'] > 0 ? Store::find($_GET['store_id']) : new Store,
		'stock'		=> $cart->checkStock(),
		'api' 		=> Asset('api'),
		'year'		=> $year,
		'times'     => $times,
		'dates'     => $dates,
		'tip'       => explode(",",User::find(1)->tip_amount)

		]);
	}

	public function getLang()
	{
		$res  = new Text;
		$lang = new Language;

		return response()->json([

		'data'  	=> $lang->getWithEng(),
		'text'		=> $res->getAppData($_GET['lang_id']),
		'setting'	=> $this->setting()

		]);	
	}

	public function item()
	{
		$store 		= new Store;
        $res   		= new Text;
        $location 	= new UserLocation;
		$location->addNew();
        
		return response()->json([

		'data' 		=> $store->item(),
		'text' 		=> $res->getAppData($_GET['lid']),
		'setting' 	=> $this->setting()

		]); 
	}

	public function getSearch()
	{
		$store = new Store;

		return response()->json(['data' => $store->getSearch() ]);
	}

	public function addToCart(Request $Request)
	{
		$res = new Cart;

		return response()->json(['data' => $res->addNew($Request->all())]);
	}

	public function updateCart($id,$type)
	{
		$res = new Cart;

		return response()->json($res->updateCart($id,$type));
	}

	public function cartCount()
	{
	  if(isset($_GET['user_id']) && $_GET['user_id'] > 0)
	  {
	  	$order = Order::where('user_id',$_GET['user_id'])->whereIn('status',[0,1,3,4])->count();
	  }
	  else
	  {
	  	$order = 0;
	  }

	  $cart = new Cart;

	  return response()->json([

	  	'data'  => Cart::where('cart_no',$_GET['cart_no'])->count(),
	  	'order' => $order,
	  	'cart'	=> $cart->getItemQty($_GET['cart_no'])

	  	]);
	}

	public function getCart($cartNo)
	{
		$res = new Cart;
		
		return response()->json(['data' => $res->getCart($cartNo)]);
	}

	public function getOffer($cartNo)
	{
		$res = new Offer;
		
		return response()->json(['data' => $res->getOffer($cartNo)]);
	}

	public function applyCoupen($id,$cartNo)
	{
		$res = new CartCoupen;
		
		return response()->json($res->addNew($id,$cartNo));
	}

	public function removeOffer($id,$cartNo)
	{
		CartCoupen::where('id',$id)->delete();

		$res = new Cart;
		
		return response()->json(['data' => $res->getCart($cartNo)]);
	}

	public function order(Request $Request)
	{
		$res = new Order;
		
		return response()->json($res->addNew($Request->all()));
	}

	public function my()
	{
		$res = new Order;

		return response()->json(['data' => $res->history()]);
	}

	public function signup(Request $Request)
	{
		$res  = new AppUser;
		
		return response()->json($res->signup($Request->all()));
	}

	public function login(Request $Request)
	{
		$res  = new AppUser;
		
		return response()->json($res->login($Request->all()));
	}

	public function forgot(Request $Request)
	{
		$res  = new AppUser;
		
		return response()->json($res->forgot($Request->all()));
	}

	public function verify(Request $Request)
	{
		$res  = new AppUser;
		
		return response()->json($res->verify($Request->all()));
	}

	public function updatePassword(Request $Request)
	{
		$res  = new AppUser;
		
		return response()->json($res->updatePassword($Request->all()));
	}

	public function saveAddress(Request $Request)
	{
		$res  = new Address;
		$res->addNew($Request->all());
		
		return response()->json(['data' => true]);
	}

	public function cancelOrder()
	{
		$order = new Order;

		return response()->json($order->cancelOrder($_GET['id'])); 
	}

	public function rating(Request $Request)
	{
		$res = new Rate;

		return response()->json($res->addNew($Request->all())); 
	}

	public function updateInfo(Request $Request)
	{
		$res = new AppUser;

		return response()->json($res->updateInfo($Request->all())); 
		
	}

	public function runningOrder()
	{
		$res = new Order;

		return response()->json([

		'data' 		=> $res->runningOrder(),

		]); 
	}

	public function orderDetail()
	{
		$res = new Order;

		return response()->json(['data' => $res->orderDetail()]);
	}

	public function payStack()
	{
		return View('payStack',['api' => User::find(1)->paystack_id]);
	}

	public function payStackSuccess(Request $Request)
	{
		
	}

	public function payStackCancel(Request $Request)
	{
		
	}

	public function verifyUser()
	{
		$res  			= AppUser::find($_GET['id']);
		$res->status 	= 1;
		$res->save();
		
		return response()->json(['data' => true,'user' => $res]);
	}
}