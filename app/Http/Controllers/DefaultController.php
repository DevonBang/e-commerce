<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class DefaultController extends Controller
{
    public function index() {
        $product = Product::query()->orderBy('created_at', 'DESC')->paginate(4);
        return view('home', [
            'products' => $product
        ]);
    }
    public function product() {
        $product = Product::orderBy('id', 'DESC')->paginate(8);
        return view('product', 
        [
            'title' => 'product',
            'products' => $product
        ]);
    }
    public function product_detail($slug) {
        $product = Product::where('slug',$slug)->first();
        
        return view('product-detail', ['product' => $product]);
    }
    public function cart() {
        return view('cart');
    }
    public function addToCart($id)
    {
        // dd($id);
        $product = Product::find($id);
        // return $product;
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }
}
