<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class change_login_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('notLoggedIn');
        $this->middleware('banned');
        $this->middleware('rank');
    }


    public function funkcja(Request $request){

        $new_login = $request->validate(['name' => 'required|max:16|unique:users']);
        $login = Auth::user()->name;


            DB::table('users')
                ->where('name', $login)
                ->update(['name' => $new_login['name']]);


            return redirect('/profile');
        }


}
