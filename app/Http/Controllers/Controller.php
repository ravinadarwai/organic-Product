<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

use App\Models\dairymodel;
use App\Models\fishmodel;

use App\Models\fruitmodel;
use App\Models\order;
use App\Models\orderproducts;
use App\Models\trendymodel;
use App\Models\User;
use App\Models\VegeModel;
use App\Models\wishlist;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs; // Add this line

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
    public function navbar(){
        return view('admin.sidebar');
    }

  
       
    public function trendyshow()
    {
        
        $products3 = trendymodel::all();


        return view('home', compact('products3' ));
    }
  


    public function showcart()
    {
        $userId = Auth::id();

    // Fetch cart items for the authenticated user
    $products = Cart::where('user_id', $userId)->get();

    return view('listcart', compact('products'));
    }


       
    public function addToCart(Request $request)
{
    // Check if the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('message', 'Please log in to add items to your cart.');
    }

    // User is authenticated, continue with adding the product to the cart
    $user = Auth::user();


    // Validate the request data if needed

    // Add the product to the cart
    Cart::create([
        'user_id' => $user->id,
        'product_id' => $request->input('product_id'),
        'name' => $request->input('name'),

        'image' => $request->input('image'),
        'rate' => $request->input('sprice'),

        'quantity' => $request->input('quantity', 1),

    ]);

    // Update the cart count in the session
    $cartCount = Cart::where('user_id', $user->id)->count();
        session(['cart_count' => $cartCount]);
   

    return redirect()->back()->with('success', 'Product added to cart successfully.');
}



public function update(Request $request, $id)
{
    $cartItem = Cart::find($id);
    
    if (!$cartItem) {
        return redirect()->route('showcart')->with('error', 'Item not found in the cart.');
    }

    $cartItem->update([
        'quantity' => $request->quantity
    ]);

    return redirect()->route('showcart')->with('success', 'Item quantity updated successfully.');
}

public function destroy($id)
{
    $cartItem = Cart::find($id);

    if (!$cartItem) {
        return redirect()->route('showcart')->with('error', 'Item not found in the cart.');
    }

    $cartItem->delete();
     $cartCount = Cart::where('user_id', Auth::id())->count();
     session(['cart_count' => $cartCount]);

    return redirect()->route('showcart')->with('success', 'Item removed from the cart.');
}

public function deleteAll()
{
    Cart::truncate(); // Delete all records from the 'carts' table
    session(['cart_count' => 0]);

    return redirect()->route('showcart')->with('success', 'All items have been removed from the cart.');
}

public function placeorder(){
     return view('placeorder');
}
public function wishlist(Request $request)
{
    // Check if the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('message', 'Please log in to add items to your cart.');
    }

    // User is authenticated, continue with adding the product to the cart
    $user = Auth::user();


    // Validate the request data if needed

    // Add the product to the cart
    wishlist::create([
        'user_id' => $user->id,
        'product_id' => $request->input('product_id'),
        'name' => $request->input('name'),
        'image' => $request->input('image'),
        'sprice' => $request->input('sprice'),
        'quant' => $request->input('quant', 1),
        'description' =>  $request->input('description'),

    ]);

    // Update the cart count in the session
    $wish = wishlist::where('user_id', $user->id)->count();
        session(['wishlist_count' => $wish]);
   

    return redirect()->back()->with('success', 'Product added to cart successfully.');
}


public function wishlistget()
{
    $products = wishlist::all();
          

     return view('wishlist', compact('products'));

}
public function destroyW($id)
{
    $wishItem = wishlist::find($id);

    if (!$wishItem) {
        return redirect()->route('wishlistget')->with('error', 'Item not found in the wishlist.');
    }

    $wishItem->delete();

    // Update the wishlist count in the session
    $wishCount = wishlist::where('user_id', Auth::id())->count();
    session(['wishlist_count' => $wishCount]);

    return redirect()->route('wishlistget')->with('success', 'Item removed from the wishlist.');
}
public function buynow($type,$id)
    {


        if($type === 'all'){
            $product = wishlist::find($id);

            return view('buynow', compact('product'));

        }
        else{
        $productType = $type;
        switch ($type) {

            case 'vegetable':
                $product = VegeModel::find($id);
                
                break;
            case 'fish':
                $product = FishModel::find($id);
                break;
            case 'dairy':
                $product = DairyModel::find($id);
                break;
            case 'fruit':
                $product = FruitModel::find($id);
                break;
            case 'trendy':
                $product = TrendyModel::find($id);
                break;
            default:
                // Handle the case when the product type is not recognized
                abort(404);
                break;
        }
    

        return view('buynow', compact('product', 'productType'));
    }
    

    }
    public function order(Request $request)
    {
       
        $validatedData = $request->all();
    
        $address = order::latest()->first();
    
        order::create($validatedData);
        // Redirect back to the form with a success message
        return view('placeorder', compact('address'));
    
        
    }
   
public function updateaddress(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required',
        'contact_no' => 'required',
        'address' => 'required',
        'pincode' => 'required',
    ]);

    // Update the address in the database
    $address = Order::latest()->first();
    $address->update([
        'name' => $request->name,
        'contact_no' => $request->contact_no,
        'address' => $request->address,
        'pincode' => $request->pincode,
    ]);

    // Redirect back with a success message
    return redirect()->route('place-order')->with('success', 'Address updated successfully');
}

public function finalorder(){
    $products = Cart::all();
    $address = order::latest()->first();


        return view('finalorder', compact('products','address'));

}
public function myorder(){

    $id = Auth::id();

    $products = orderproducts::all();

    $latestOrder = orderproducts::latest('id')->first(); // Fetch the most recently added order
    return view('myorder', compact( 'id' , 'latestOrder', 'products'));
   

}

public function placeorderr()
{
    // Get the user ID of the currently authenticated user
    $userId = Auth::user()->id;

    // Get all the product IDs and names from the 'carts' table for this user
    $cartItems = Cart::where('user_id', $userId)->select('product_id', 'name' ,'rate', 'image')->get();
    $totalPrice = Session::get('totalPrice', 0)-10;
    $rs=User::all()->max('id');
    
    $jh = order::all()->max('id');


    // Initialize arrays to store product IDs and names
    $productIds = [];
    $productNames = [];
    $productimage = [];
    $productsprice = [];


     
    foreach ($cartItems as $cartItem) {
        $productIds[] = $cartItem->product_id;
        $productNames[] = $cartItem->name;
        $productimage[] = $cartItem->image;
        $productsprice[]= $cartItem->rate;



    }

    // Serialize arrays to JSON format
    $productIdsJson = json_encode($productIds);

    // Insert the serialized JSON data into the 'orderproducts' table
    orderproducts::create([
        'user_id' => $rs,
        'order_id' => $jh, 
        'product_id' => $productIdsJson,
        'name' => json_encode($productNames),
        'image' => json_encode($productimage),
'sprice' =>json_encode($productsprice),
        'total_amount' => $totalPrice,
        
         // Insert the total price from the session

         // Store product names as JSON or adjust the column type
    ]);

    // You can also add additional logic here, such as clearing the 'carts' table or calculating the total amount.

    return redirect('finalorder'); // Redirect to a success page or any other appropriate action.
}
    public function updateStatus(Request $request)
{
    $orderId = $request->input('order_id');
    //dd($orderId);

    $order = orderproducts::findOrFail($orderId);
    // dd($order);
    $order->status = 'cancel';
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}


}