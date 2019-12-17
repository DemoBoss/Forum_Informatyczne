<?php

namespace App\Http\Controllers;

use App\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class profile_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('notLoggedIn');
        $this->middleware('banned');
        $this->middleware('rank');
    }

    public function zmien_avatar(Request $request){

        $avatar_id = $request->input('avatar');



        DB::table('users')
            ->where('id', Auth::user()->id )
            ->update(['avatar_id' => $avatar_id]);

        $change_avatar_status = "Zmieniono Avatar";

        return redirect('profile')->with(compact('change_avatar_status'));
    }


    public function go_to_profile()
    {

        $login = Auth::user()->name;
        $dane = DB::table('users')->where('name', $login)->first();

        $rank_name = $dane->rank_name;
        $role_name = $dane->role_name;
        $avatar = $dane->avatar_id;

        $all_avatars = Avatar::get();

        $row = DB::table('avatars')->where('id', $avatar)->first();
        $current_avatar = $row->avatar;

        return view('profile', compact('rank_name', 'role_name', 'current_avatar','all_avatars'));
    }
}
