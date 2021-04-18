<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    
    public function userUpdate(Request $request) {
        if(request()->has('avatar')){$avataruploaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruploaded->move($avatarpath, $avatarname);
            $userUpdate =[
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => '/images/' . $avatarname,
            ];
            // return dd($userUpdate);
            DB::table('users')->where('id', Auth::user()->id)->update($userUpdate);
            return redirect()->back()->with('userUpdate','Success');
        } else{
            $userUpdate =[
                'name' => $request->name,
                'email' => $request->email,
            ];
            // return dd($userUpdate);
            DB::table('users')->where('id', Auth::user()->id)->update($userUpdate);
            return redirect()->back()->with('userUpdate','Success');
        }
    }
}