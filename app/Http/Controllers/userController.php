<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    // GET ALL USERS
    public function getAllUser(Request $request) {
        return User::all();
    }

    // GET USER
    public function  getUser(Request $request) {
        
        $user = User::findOrFail($request->user_id);
        return $user;
    }

    // CREATE USER
    public function createUser(Request $request) {
        
        $user = new User([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);
        
        $user->save();
    }

    // UPDATE USER
    public function editUser(Request $request) {
        
        $user = User::findOrFail($request->user_id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();
    }

    // DELETE USER
    public function deleteUser(Request $request) {
        
        User::where('id', $request->user_id)->delete();
        
    }


}
