<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        // show data
        $profile = Auth()->user();
        $products = Product::orderBy('id', 'DESC')->get();

        return view('Admin.products.index',[
            'products' => $products,
            "title" => 'product',
            'profile' => $profile,
         ]);
    }
    public function store(Request $request)
    {
        try{
            $validate = $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:products',
                'quantity' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            ]);
            
            $store = new Product;
            $store->name = $request->name;
            $store->slug = $request->slug;
            $store->quantity = $request->quantity;
            $store->price = $request->price;
            $store->description = $request->description;

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = date('Y-m-d').'-'.$request->slug.'.'.$ext;
    
                $file->move('storage/foto-product/', $filename);
                $store->image = $filename;
            }

            $store->save();

            // $foto = $request->file('image');
            // $filename = date('Y-m-d-').$foto->getClientOriginalName();
            // $path = 'foto-product/'.$filename;
            
            // Storage::disk('public')->put($path, file_get_contents($foto));
    
            // $validate['image'] = $filename;
            
            // Product::create($validate);
            
            // return redirect()->route('admin.products');

            return ['status' => true, 'pesan' => 'Berhasil!'];
        } catch(\Exception $e){
            return ['status' => false, 'error' => 'Error'];
        }
    }
    public function edit($id)
    {
        $product = Product::find($id);
        // $profile = Auth()->user();
        if($product)
        {
            return response()->json([
                'status' => 200,
                'product' => $product,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'gak ada nih'
            ]);
        }
    }
    public function update(Request $request,$id)
    {
        try {
            $validate = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'quantity' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'mimes:png,jpeg,jpg|max:2048',
            ]);

            $find = Product::find($id);
            $find->name = $request->name;
            $find->slug = $request->slug;
            $find->quantity = $request->quantity;
            $find->price = $request->price;
            $find->description = $request->description;
            
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = date('Y-m-d').'-'.$request->slug.'.'.$ext;
    
                $file->move('storage/foto-product/', $filename);
                $find->image = $filename;
            }
            
            $find->save();
            
            return ['status' => true, 'pesan' => 'Berhasil!'];
        } catch(\Exception $e) {
            return ['status' => false, 'error' => 'Error'];
        }
        // dd($request->image);
    }
    public function destroy(Product $id)
    {
        $data = Product::find($id);
        Product::destroy($data);
        return redirect()->route('admin.products');
    }

}
