<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('User.dashboard');
    }
    public function profile() {
        $profile = Auth()->user();
        return view('User.profile.index')->with('profile', $profile);
    }
    public function profile_edit() {
        $profile = Auth()->user();
        return view('User.profile.edit')->with('profile', $profile);
    }
    public function update(Request $request, $id) {
        $validate = $request->validate([
            'email'     => 'email',
            'name' => 'min:5',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
        ]);

        $find = User::find($id);

        $foto = $request->file('image');
        if($foto) {
            $filename = date('Y-m-d').$foto->getClientOriginalName();
            $path = 'foto-user/'.$filename;
            
            if($find->image) {
                Storage::disk('public')->delete('foto-user/' . $find->image);
            }
            Storage::disk('public')->put($path, file_get_contents($foto));
            $validate['image'] = $filename;
        }

        User::whereId($id)->update($validate);
        
        return redirect()->route('user.profile');
    }
    public function history() {
        $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'Desc')->get()->toArray();
        // dd($orders);
        return view('User.order.history', ['title' => 'history'])->with(compact('order'));
    }
    public function history_detail($id) {
        $orders=Order_item::where('order_id', $id)->paginate(5);
        return view('user.order.list-order')->with('orders', $orders);
    }
    public function pesanan() {
        $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'Desc')->get()->toArray();
        return view('User.order.history', ['title' => 'pesanans'])->with(compact('order'));
    }
}
