<?php

namespace App\Http\Controllers;
use Hash;
use File;
use App\Adimn;
use Illuminate\Http\Request;
use App\Categories;
use App\Products;
use App\Orders;
use Redirect;
use Session;
use Symfony\Component\Console\Helper\Table;
use Validator;
class AdminController extends Controller
{
    //

public function admin(){

    $posts = Products::all();
    $order = Orders::all();
    $complete=  Orders::where('delivery_status', 'yes')->get();
    $pending_delivery=  Orders::where('delivery_status', 'no')->where('status', 'approved')->get();

    $pend=  Orders::where('status', 'pending')->get();
    $post = $posts->count();
    $orders = $order->count();
    $delivery = $pending_delivery->count();
    $completed = $complete->count();
    $pending = $pend->count();
    return view('admin', compact(['post','orders', 'completed', 'pending','delivery']));


}
    public function category()
    {
        $categories = Categories::all();
        return view('categories', compact(['categories' ]));


    }
     public function show_cartegories($dataID)
    {
        $category = Categories::where('id', $dataID)->first();

        $category->is_hidden='no';

        $category->save();
        Session::flash('show.hide', "Category will be seen by user");
        return redirect('/categories');


    }

    public function hide_cartegories($dataID)
    {
        $category = Categories::where('id', $dataID)->first();

        $category->is_hidden='yes';

        $category->save();
        Session::flash('show.hide', "Category will not be seen by user");
             return redirect('/categories');


    }

    public function edit_category(Request $request)
    {
        $category = Categories::where('id', $request->id)->first();

        $category->name=$request->name;

        $category->save();

             return redirect('/categories');


    }

    public function edit_product(Request $request)
    {
        $category = Products::where('id', $request->id)->first();

        $category->name=$request->name;
        $category->description=$request->description;
        $category->price=$request->price;
        $category->original_price=$request->original_price;

        $category->save();

             return redirect('/products');


    }

    public function approve_order($dataID)
    {
        $order = Orders::where('id', $dataID)->first();

        $order->status='approved';

        $order->save();

             return redirect('/pendingorders');


    }
    public function is_delivered($dataID)
    {
        $order = Orders::where('id', $dataID)->first();

        $order->delivery_status='yes';

        $order->save();

             return redirect('/pendingdeliveries');


    }


    public function delete_cartegories($dataID)
    {
        $category = Categories::where('id', $dataID)->first();

        $category->delete();
        $categories = Categories::all();
             return redirect('/categories');


    }

    public function delete_product($dataID)
    {
        $category = Products::where('id', $dataID)->first();
        $destinationPath = 'product';

        File::delete(public_path("product/".$category['photo']));
        $category->delete();
        $categories = Categories::where('is_hidden', 'no')->get();
        $products = Products::all();
        return view('products', compact(['categories', 'products' ]));



    }

    public function show_product($dataID)
    {
        $category = Products::where('id', $dataID)->first();

        $category->is_hidden='no';

        $category->save();
        $categories = Categories::where('is_hidden', 'no')->get();
        $products = Products::all();
        Session::flash('show.hide', "Products will be seen by user");
        return Redirect::back();

    }

    public function show_hidden_product($dataID)
    {
        $category = Products::where('id', $dataID)->first();

        $category->is_hidden='no';

        $category->save();
        $categories = Categories::where('is_hidden', 'no')->get();
        $products = Products::all();
        return redirect('/hidden_products');

    }

    public function hide_product($dataID)
    {
        $category = Products::where('id', $dataID)->first();

        $category->is_hidden='yes';

        $category->save();

        Session::flash('show.hide', "Products hidden from user");
        return Redirect::back();
    }




    public function products()
    {
        $categories = Categories::where('is_hidden', 'no')->get();
        $products = Products::all();
        return view('products', compact(['categories', 'products' ]));


    }
    public function pendingorders()
    {
        $orders = Orders::where('status', 'pending')->orderBy('created_at', 'DESC')->get();

        return view('pending_orders', compact(['orders']));


    }
    public function pendingdeliveries()
    {
        $orders = Orders::where('delivery_status', 'no')->orderBy('created_at', 'DESC')->get();

        return view('pending_deliveries', compact(['orders']));


    }
    public function completeorders()
    {
        $orders = Orders::where('delivery_status', 'yes')->orderBy('created_at', 'DESC')->get();

        return view('completeorders', compact(['orders']));


    }
    public function hidden_products()
    {
        $categories = Categories::all();
              $products=  Products::where('is_hidden', 'yes')->orderBy('created_at', 'DESC')->get();
        return view('hiddenproducts', compact(['categories', 'products' ]));


    }

    public function post_category(Request $request)
    {

        $request->validate([
            'name'=>'required',

        ]);



        $contact = new Categories([
            'name' => $request->get('name'),
                    ]);
        $contact->save();
        return redirect('/categories')->with('success', 'Category saved!');

    }



    public function store_product(Request $request)
    {
        $request->validate([

            'file' =>'required',
        ]);
       // ensure the request has a file before we attempt anything else.
       if ($request->hasFile('file')) {

        $request->validate([
            'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
        ]);

        // Save the file locally in the storage/public/ folder under a new folder named /product
       // $request->file->store('product', 'public');
        $imageName = $request->file->hashName();
        $request->file->move(public_path('product'), $imageName);

        // Store the record, using the new file hashname which will be it's new filename identity.
        $product = new Products([

            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "photo" => $imageName,
            "category" => $request->get('category'),
            "price" => $request->get('price'),
            "original_price" => $request->get('original_price')



        ]);
        $product->save(); // Finally, save the record.
        return redirect('/products')->with('success', 'Product saved!');
    }
    else{

        return view('pages.tec_pages.tecshopAdimin');
    }



    }


    public function search_products(Request $request)
    {


        $cart=  Categories::where('name', $request->cart)->first();
        $cart_id = $cart['id'];
       $products=  Products::where('category_id', $cart_id)->get();

       $output="";


       foreach ($products as  $product) {
           if ( $product->is_hidden == "yes")
        {
        $output.='<tr>'.
        '<td>'.$product->id.'</td>'.
        '<td>'.$product->name.'</td>'.
        '<td>'.$product->description.'</td>'.
        '<td>'.$product->price.'</td>'.
        '<td>'.$product->original_price.'</td>'.
        '<td>'.$product->is_hidden.'</td>'.

        '</tr>';
        }
        else{
            $output.='<tr>'.
            '<td>'.$product->id.'</td>'.
            '<td>'.$product->name.'</td>'.
            '<td>'.$product->description.'</td>'.
            '<td>'.$product->price.'</td>'.
            '<td>'.$product->original_price.'</td>'.
            '<td>'.$product->is_hidden.'</td>'.

            '</tr>';

        }
        }
        return Response($output);




       // return response()->json($products);

       // return response()->json(['success'=>'Ajax request submitted successfull]);
    }


    public function search_order(Request $request)
    {


        $products=  Orders::where('phone_number', $request->phone)->orderBy('created_at', 'DESC')->get();



       $output="";


       foreach ($products as  $product) {

        $output.='<tr>'.
        '<td>'.$product->id.'</td>'.
        '<td>'.$product->names.'</td>'.
        '<td>'.$product->phone_number.'</td>'.
        '<td>'.$product->order_number.'</td>'.
        '<td>'.$product->item_count.'</td>'.
        '<td>'.$product->total.'</td>'.
               '<td>'.

        '<a style="margin: 19px;" onclick="fetchproduct('.$product->id.')"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-whatever="@getbootstrap">'.'View Order'.'</a>'.






        '</td>'.
        '</tr>';

        }
        return Response($output);




       // return response()->json($products);

       // return response()->json(['success'=>'Ajax request submitted successfull]);
    }



    public function fetchcat(Request $request)
    {


        $cart=  Categories::where('id', $request->catid)->first();
              $output="";
              $out=$cart['name'];


        $output.='<input type="text" class="form-control" id="recipient-name" value="'.$cart['id'].'" name="id" required hidden>'.
        '<input type="text" class="form-control" id="recipient-name" value="'.$out.'" name="name" required>';

        return Response($output);




       // return response()->json($products);

       // return response()->json(['success'=>'Ajax request submitted successfull]);
    }

    public function view_orderhistory($dataId)
    {

        $posts=  Orders::whereIn('id',[$dataId])->first();

        $cartss=unserialize($posts->cart);
        return view('vieworder', compact(['posts','cartss']));

    }
    public function fetchproduct(Request $request)
    {


        $cart=  Products::where('id', $request->catid)->first();
              $output="";
              $out=$cart['name'];


        $output.= '<div class="form-group">'.
        '<label for="recipient-name" class="col-form-label">Product Name:</label>'.
        '<input type="text" class="form-control" id="recipient-name" value="'.$cart['name'].'" name="name" required>'.
        '<input type="text" class="form-control" id="recipient-name" value="'.$cart['id'].'" name="id" required hidden>'.
      '</div>'.
      '<div class="form-group">'.
      '<label for="recipient-name" class="col-form-label">Product Description:</label>'.
      '<input type="textarea" class="form-control" id="recipient-name" value="'.$cart['description'].'" name="description" required>'.
    '</div>'.
    '<div class="form-group">'.
    '<label for="recipient-name" class="col-form-label">Product Price:</label>'.
    '<input type="text" class="form-control" id="recipient-name" value="'.$cart['price'].'" name="price" required>'.
  '</div>'.
  '<div class="form-group">'.
  '<label for="recipient-name" class="col-form-label">Product Original Price:</label>'.
  '<input type="text" class="form-control" id="recipient-name" value="'.$cart['original_price'].'" name="original_price" required>'.
'</div>';



        return Response($output);




       // return response()->json($products);

       // return response()->json(['success'=>'Ajax request submitted successfull]);
    }



    public function change_password(Request $request)
    {
       $this->validate($request, [
            'newpassword' => 'required| min:4| max:7 |confirmed',
            'oldpassword' => 'required'

        ]);




       $id = auth()->guard('adminauth')->user()->id;
       $user=  Adimn::where('id', $id)->first();

        $user->password= Hash::make($request->newpassword);

        $user->save();

        return response()->json(['success'=>'Password changed successfullly']);

    }


    

}
