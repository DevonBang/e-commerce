<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return view('Admin.products.index',[
            'products' => $product
         ]);
    }
    public function create()
    {
        return view('Admin.products.create');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_product' => 'required',
            'slug' => 'required|unique:products',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
        ]);
        
        $foto = $request->file('image');
        $filename = date('Y-m-d-').$foto->getClientOriginalName();
        $path = 'foto-product/'.$filename;
        
        Storage::disk('public')->put($path, file_get_contents($foto));

        $validate['image'] = $filename;
        
        Product::create($validate);
        
        return redirect()->route('admin.products');
    }
    public function edit(Product $product,$id)
    {
        $data = Product::find($id);
        return view('Admin.products.edit',[
            'product' => $data
        ]
        );
    }
    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'nama_product' => 'required',
            'slug' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpeg,jpg|max:2048',
        ]);
        
        $find = Product::find($id);

        $foto = $request->file('image');
        if($foto) {
            $filename = date('Y-m-d').$foto->getClientOriginalName();
            $path = 'foto-product/'.$filename;
            
            if($find->image) {
                Storage::disk('public')->delete('foto-product/' . $find->image);
            }
            Storage::disk('public')->put($path, file_get_contents($foto));
            $validate['image'] = $filename;
        }
        
        Product::whereId($id)->update($validate);
        
        return redirect()->route('admin.products');
    }
    public function destroy(Product $id)
    {
        $data = Product::find($id);

        Product::destroy($data);

        return redirect()->route('admin.products');
    }
}
