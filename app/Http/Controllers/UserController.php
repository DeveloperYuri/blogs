<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(){
        $data['getRecord'] = User::getRecordUser();
        return view('backend.user.list', $data);
    }

    public function add_user(Request $request){
        return view('backend.user.add');
    }

    public function insert_user(Request $request){
        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->status = trim($request->status);
        $save->save();

        return redirect('panel/user/list')->with('success', "User Succesfully Created");
    }


}
