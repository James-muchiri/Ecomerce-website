<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Orders;
use App\Products;
use App\Eshopusers;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $categories = Categories::where('is_hidden','=','no')->get();
        $product = products::all()->where('is_hidden','=','no')->groupBy('category');
        $products = products:: where('is_hidden','=','no')->get();
        $newproducts = products:: where('is_hidden','=','no')->orderBy('created_at', 'DESC')->get();
        return view('index', compact(['categories', 'products', 'product','newproducts' ]));


    }

    public function aboutus()
    {
        $categories = Categories::where('is_hidden','=','no')->get();
        $product = products::all()->where('is_hidden','=','no')->groupBy('category');
        $products = products:: where('is_hidden','=','no')->get();
        $newproducts = products:: where('is_hidden','=','no')->orderBy('created_at', 'DESC')->get();
        return view('aboutus', compact(['categories', 'products', 'product','newproducts' ]));


    }
    public function contactus()
    {
        $categories = Categories::where('is_hidden','=','no')->get();
        $product = products::all()->where('is_hidden','=','no')->groupBy('category');
        $products = products:: where('is_hidden','=','no')->get();
        $newproducts = products:: where('is_hidden','=','no')->orderBy('created_at', 'DESC')->get();
        return view('contactus', compact(['categories', 'products', 'product','newproducts' ]));


    }

    public function addToCart(Request $request,$dataId)
    {
        session()->get('cart');
        // dd($dataId);
              $product = Products::find($dataId);

        // dd($product);
        $cart = session()->get('cart');
        // dd($cart);

        if(!$cart) {

            $cart = [
                $dataId => [
                    "id"=>$product->id,
                    "product" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->photo,
                ]
            ];
            // dd($cart);
            session()->put('cart', $cart);
            // dd(session()->get('cart'));
            return response()->json($cart);
        }


        if(isset($cart[$dataId])) {

            // dd(session()->get('cart'));
            session()->put('cart', $cart);
            // dd(session()->get('cart'));
                // dd($cart[$dataId]['quantity']);
                return response()->json($cart);

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$dataId] = [
            "id"=>$product->id,
            "product" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->photo,

        ];

        session()->put('cart', $cart);

        return response()->json($cart);


    }




public function getCart(Request $request){

    $data=session()->get('cart');

    // dd($data);
    // dd(response()->json($data));
       return response()->json($data);
}

public function addByOne($dataId){
    // dd($dataId);
    $products =  Products::find($dataId);
    // dd($products);
    $cart = session()->get('cart');
    // dd($cart);
    if(isset($cart[$dataId])) {
        // dd($cart[$dataId]);
        $cart[$dataId]['quantity']++;
        // dd(session()->get('cart'));
        session()->put('cart', $cart);
        //  dd(session()->get('cart'));
        $cart = session()->get('cart');
        // dd($cart);
        return response()->json($cart);

    }
}

public function reduceByOne($dataId){
    // dd($dataId);
    $products = Products::find($dataId);
    // dd($products);
    $cart = session()->get('cart');
    // dd($cart);
    if (isset($cart[$dataId])) {
        // dd($cart[$dataId]);
        if ($cart[$dataId]['quantity'] > 1) {
            $cart[$dataId]['quantity']--;
            // dd(session()->get('cart'));
            session()->put('cart', $cart);
            // dd(session()->get('cart'));
            $cart = session()->get('cart');
            // dd($cart);
            return response()->json($cart);
        }
    }
}

public function getRemoveItem($dataId){

 $cart = session()->get('cart');
    // dd($cart[$dataId]);
    if(isset($cart[$dataId])) {

        unset($cart[$dataId]);

        session()->put('cart', $cart);
        // dd(session()->get('cart'));
        return response()->json($cart);
    }
}




public function destroyCart()
{
    session()->forget('cart');
    // $db=Order::join('tecshop_users', 'tecshop_users.id','=','orders.tecshop_users_id' )
    //             ->get(['tecshop_users.first_name', 'orders.region']);
    // // dd($db);
    // $db2=ItemsOrdered::join('tecshop_products', 'tecshop_products.id','=','items_ordered.tecshop_products_id' )
    //                 ->join('orders', 'orders.id','=','items_ordered.order_id')
    //                 ->get(['tecshop_products.product', 'items_ordered.order_id', 'orders.first_name']);
    // // dd($db2);
    // $arr = DB::table('orders')->pluck('cart')->find(24);
    return redirect('/tecshop');
}



public function checkout()
{
    $cart = session()->get('cart');
    // dd($cart);
    if(!$cart){
        return redirect()->back();
    }else{

  
       

        return redirect()->route('checkout_signIn');

    }
}


public function checkout_signIn(Request $request)
{
    $product = products::all()->where('is_hidden','=','no')->groupBy('category');
    $categories = Categories::where('is_hidden','=','no')->get();
    $products = Products::where('is_hidden','=','no')->get();
    $user=auth()->guard('userauth')->user();
    $cart = session()->get('cart');
    if (!$user) {
        return view('auth.User_Sign_In');
    } elseif(!$cart) {
      
        return redirect()->route('index');

    }
    else{
        return view('checkout', compact(['products', 'cart', 'categories', 'product']));
    }
}

public function myOrders(){
    $user=auth()->guard('userauth')->user();
    if (!$user) {
        return view('auth.User_Sign_In');
    } else{

        $product = products::all()->where('is_hidden','=','no')->groupBy('category');
        $categories = Categories::where('is_hidden','=','no')->get();
        $products = Products::where('is_hidden','=','no')->get();
        $orders = Orders::where('user_id', auth()->guard('userauth')->user()->id )->get();

        return view('myOrders', compact(['products', 'categories', 'product', 'orders']));
    }

}





public function search(Request $request)
{





    $categories = $request->input('categories');
    $query = "%".$request->name."%";
    if($categories='all'){

        $products = Products::where('name','LIKE',$query)->orwhere('category','LIKE',$query)->where('is_hidden','=','no')->get();
    }
    else {
        $products = products:: where('name','LIKE',$query)
        ->where('category','=',$categories)->where('is_hidden','=','no')->get();
    }
    $product = products::all()->where('is_hidden','=','no')->groupBy('category');
    $cart=session()->get('cart');
    $categories = Categories::all();
    return view('search', compact(['products', 'cart', 'categories', 'product']));
}


public function searchbycat($dataId)
{


        $cat = Categories::where('name',$dataId)->first();
        $post = $cat['name'];

        $products = products:: where('category','=',$post)->where('is_hidden','=','no')->get();

        $product = products::all()->where('is_hidden','=','no')->groupBy('category');
    $cart=session()->get('cart');
    $categories = Categories::where('is_hidden','=','no')->get();
    return view('search', compact(['products', 'cart', 'categories', 'product']));
}




public function checkout_products(Request $request)
{
    $request->validate([

        'names' =>'required',
        'phone_number' =>'required',
    ]);

    $cart=session()->get('cart');
    // Store the record, using the new file hashname which will be it's new filename identity.
    $total=0;
    $item_count=0;
    foreach($cart as $carts)
    {
        $price = $carts['price'] * $carts['quantity'] ;
        $total= $total + $price;
        $item_count = $item_count + $carts['quantity'];


    }


     $order= new Orders();
    $order->names = $request->get('names');
    $order->user_id = auth()->guard('userauth')->user()->id;
    $order->phone_number = $request->get('phone_number');
    $order->mode_of_delivery = $request->get('mode');
    if( $order->mode_of_delivery == 'delivery')
    {
    $order->location = $request->get('location');
    }
      $order->total = $total;
    $order->item_count = $item_count;
    $order->order_number =uniqid();
    $order->cart = serialize($cart);
    $order->save(); // Finally, save the record.
    if (Session::has('order-number')){
        $request->session()->forget('order-number');
        Session::put('order-number', $order->order_number);
    }else{
        Session::put('order-number', $order->order_number);
    }

    $request->session()->forget('cart');

    return redirect('/success');








}

public function inde(Request $request){
    $query = "%".$request->key."%";
    $categories = Products::where('name','LIKE',$query)->where('is_hidden','=','no')->get();

    foreach($categories as $category){
        echo "<div id='item'>";
        echo "<a href='search/$category->name'>$category->name</a>";
        echo "</div>";
        echo "<br>";
    }
}

public function search1($data)
{

    $categories = "all";
    $item = $data;
    if($categories='all'){

        $products = products:: where('name','LIKE',$item)->where('is_hidden','=','no')->get();
    }
    else {
        $products = products:: where('name','=',$item)->where('categories','=',$categories)
        ->where('is_hidden','=','no')->get();
    }
    $product = products::all()->where('is_hidden','=','no')->groupBy('category');
    $cart=session()->get('cart');
    $categories = Categories::where('is_hidden','=','no')->get();
    return view('search', compact(['products', 'cart', 'categories', 'product']));
}

public function success(){
    $product = products::all()->where('is_hidden','=','no')->groupBy('category');
    $cart=session()->get('cart');
    $categories = Categories::where('is_hidden','=','no')->get();
    return view('success', compact(['cart', 'categories', 'product']));
}


public function register(){
    return view('auth.userRegister');
}




public function store_user_reg(Request $request)
{

   $details= request()->validate([
    'first_name' => ['required', 'string', 'max:255'],
    'middle_name' => ['required', 'string', 'max:255'],
    'last_name' => ['required', 'string', 'max:255'],
    'phone_no' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email','max:255', 'unique:eshopusers'],
        'address' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed']
    ]);

    $user =  Eshopusers::create([
        'first_name'=>$details['first_name'],
        'middle_name'=>$details['middle_name'],
        'last_name'=>$details['last_name'],
        'phone_no'=>$details['phone_no'],        
        'email'=>$details['email'],
        'address'=>$details['address'],
        'password'=> Hash::make($details['password'])
        ]);

    return Redirect::route('getSignIn');    
}

public function adverts(){
    $product = products::all()->where('is_hidden','=','no')->groupBy('category');
 
    $categories = Categories::where('is_hidden','=','no')->get();
    return view('adverts', compact(['categories', 'product']));
}


public function view_orderhistory($dataId)
{

    $posts=  Orders::whereIn('id',[$dataId])->first();

    $cartss=unserialize($posts->cart);
    $categories = Categories::where('is_hidden','=','no')->get();
    $product = products::all()->where('is_hidden','=','no')->groupBy('category');
 
    return view('uservieworder', compact(['posts','cartss', 'categories', 'product']));

}

}
