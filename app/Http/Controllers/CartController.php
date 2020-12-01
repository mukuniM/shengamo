<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\MyList;
use Illuminate\Http\Request;
use App\Livewire\LoginRegister;
use DB;
use Session;

class CartController extends Controller
{
    public $key;

    public function shop(Request $request)
    {
        if($request->session()->has('my_name'))  {     
           $products = Product::all();
            return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
            echo $request->session()->get('my_name');}
        else{
           // echo 'No data in the session';
           return redirect('login');
        }
    }
    
    public function list(Request $request)
    {
        if($request->session()->has('my_name'))  { 
            return view('list')->withTitle('E-LIST');
        }
        else {
            // echo 'No data in the session';
            return redirect('login');
        }
    }
    
    public function submit(Request $request)
    {
        return redirect()->back()->with('success_msg',"List Submitted Successfully.");
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
            'image' => $request->img,
            'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');
    }

    public function addList(Request$request){
        MyList::create([
            'name' => $request->item,
            'quantity' => 1
        ]);
        return redirect('list')->with('success_msg', 'Item is Added to List!');
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function removeList(Request $request){
        DB::table('my_lists')->delete([
            'id' => $request->id
            ]);
        return redirect()->route('list')->with('success_msg', 'Item is removed!');
    }

    public function clearList(Request $request){
        DB::table('my_lists')->delete();
        return redirect()->route('list')->with('success_msg', 'List is Cleared!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Cart is cleared!');
    }

    public function cart(Request $request)  {
        if($request->session()->has('my_name'))  { 
            $cartCollection = \Cart::getContent();
            return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);}
        else{
            // echo 'No data in the session';
            return redirect('login');
        }
    }

    public function accessSessionData(Request $request) {
        if($request->session()->has('my_name'))
           echo $request->session()->get('my_name');
        else
           echo 'No data in the session';
     }
     public function storeSessionData(Request $request) {
        $request->session()->put('my_name','Muyangwa Mukuni');
        echo "Data has been added to session";
     }
     public function deleteSessionData(Request $request) {
        $request->session()->forget('my_name');
        echo "Data has been removed from session.";
     }

     public function logout(Request $request)
    {
        $request->session()->forget('my_name');
        echo "Data has been removed from session.";
        return redirect()->route('login')->with('success_msg', 'You have logged out!');
    }

    public function bypass(Request $request)
    {      
        if(($request->key)==='admin'){
            $request->session()->put('my_name','admin');
            return redirect('list');
        }else{
            return redirect()->back()->with('error',"Failed.");
        }
    }
}

