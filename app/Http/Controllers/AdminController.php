<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $profile = Auth()->user();
        return view('Admin.dashboard', 
        [
            'title' => 'dashboard',
            'profile' => $profile
        ]);
    }
    // public function profile_edit() {
    //     $profile = Auth()->user();
    //     return view('User.profile.edit')->with('profile', $profile);
    // }
    // public function update(Request $request, $id) {
    //     $validate = $request->validate([
    //         'email'     => 'email',
    //         'name' => 'min:5',
    //         'image' => 'required|mimes:png,jpeg,jpg|max:2048',
    //     ]);

    //     $find = User::find($id);

    //     $foto = $request->file('image');
    //     if($foto) {
    //         $filename = date('Y-m-d').$foto->getClientOriginalName();
    //         $path = 'foto-user/'.$filename;
            
    //         if($find->image) {
    //             Storage::disk('public')->delete('foto-user/' . $find->image);
    //         }
    //         Storage::disk('public')->put($path, file_get_contents($foto));
    //         $validate['image'] = $filename;
    //     }

    //     User::whereId($id)->update($validate);
        
    //     return redirect()->route('user.profile');
    // }
}
