<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\dairymodel;
use App\Models\FishModel;
use App\Models\FruitModel;
use App\Models\MetaData;
use App\Models\TrendyModel;
use App\Models\VegeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {

        $products = VegeModel::paginate(8);
        $products1 = FishModel::paginate(8);
        $products2 = dairymodel::paginate(8);
        $products3 = TrendyModel::paginate(9);
        $products4 = FruitModel::paginate(8);
        $products5 = Blog::paginate(3);
    
$meta= MetaData::find(1);
// dd($meta);
            return view('home', compact('products', 'products1', 'products2', 'products3', 'products4', 'products5','meta'));
        
    }
    
    public function showAll()
    {
       
        $products = VegeModel::all();
        $products1 = FishModel::all();
        $products2 = dairymodel::all();
        $products3 = TrendyModel::all();
        $products4 = FruitModel::all();
        $products5 = Blog::all();
        $meta= MetaData::find(3);


        return view('showAll', compact('products' , 'products1', 'products2' , 'products3' , 'products4', 'products5','meta'));  
      }
    
    public function trendshow()
    {
       
        $products = TrendyModel::paginate(9);
        

        return view('home', compact('products'));
    }
    public function contact()
{
    $meta= MetaData::find(5);

    return view('contact',compact('meta'));
}

public function send(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    Contact::create($validatedData);
    // Redirect back with a success message
    return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
}





public function blog()
{
    $meta= MetaData::find(4);

    $blogPosts = Blog::all(); // Assigning a value to $blogPosts
    return view('blogpage', ['blogPosts' => $blogPosts,'meta'=>$meta]);
}


public function about(){
    $meta= MetaData::find(2);

    return view('about',compact('meta'));
}

}