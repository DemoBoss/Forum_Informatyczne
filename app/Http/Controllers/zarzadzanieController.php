<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Section;
use App\Topic;
use App\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class zarzadzanieController extends Controller
{

    public function __construct()
    {
        $this->middleware('notLoggedIn');
        $this->middleware('banned');
        $this->middleware('rank');
    }


    public function go_to_zarzadzanie(){

        $sections = Section::get();
        $avatars = Avatar::get();
        $list = array();
        $mods = DB::table('users')->where('role_name', 'Moderator')->get();
        $users = DB::table('users')->where('role_name', 'Zwykły Użytkownik')->get();
        $all_users = User::all();

        foreach ($avatars as $avatar){

            $string_avatar = base64_encode($avatar->avatar);
            array_push($list, $string_avatar);

        }


        return view('Admin.zarzadzanie', compact('mods', 'avatars', 'list', 'sections','users', 'all_users'));
    }



    public function usun_moderatora(Request $request){

        $login = $request->input('login');

        DB::table('users')
            ->where('name', $login)
            ->update(['role_name'=>"Zwykły użytkownik"]);
        $status = 'Użytkownik "'.$login.'" stał się zwykłym użytkownikiem.';



        return redirect('zarzadzanie')->with(compact('status'));
    }



    public function dodaj_moderatora(Request $request){

        $user_id = $request->input('user_id');

        $user = DB::table('users')->where('id', $user_id)->first();

        $users = User::pluck('id');

        if(!$users->contains($user_id)){

            $status = 'Użytkownik o loginie "'. $user->name .'" nie istnieje.';

        }else{


            if($user->role_name == 'Moderator' || $user->role_name == 'Admin'){

                $status = 'Użytkownik "'.$user->name.'" już jest moderatorem.';

            }else {
                DB::table('users')->where('id', $user_id)->update(['role_name' => 'Moderator']);
                $status = 'Użytkownik "' . $user->name . '" został moderatorem.';
            }
        }


        return redirect('zarzadzanie')->with(compact('status'));
    }

    public function stworz_temat(Request $request){

        $name = $request->validate(['name' => 'required']);
        $id = $request->input('section');
        $opis = $request->validate(['opis' => 'required']);

        Topic::create([
            'name' => $name['name'],
            'description' => $opis['opis'],
            'user_id' => Auth::user()->id,
            'section_id' => $id,
        ]);

        $status_topic = "Temat został stworzony";


        return redirect('zarzadzanie')->with(compact('status_topic'));
    }


    public function ban_user(Request $request){
        $id = $request->input('user_id');
        $user = User::where('id', $id)->first();
        if($user->role_name == 'Admin'){
            $komunikat = "Nie można zbanować Administratora";
        }else{
            User::where('id',$id)->update(['banned' => 1]);
            $user = User::where('id', $id)->first();

            $komunikat = "Użytkownik ".$user->name." został zbanowany";
        }


        return back()->with(compact('komunikat'));
    }


    public function unban_user(Request $request){
        $id = $request->input('user_id');
        $user = User::where('id', $id)->first();
        User::where('id', $id)->update(['banned'=> 0]);

        $komunikat = "Użytkownik ".$user->name." został odbanowany";

        return back()->with(compact('komunikat'));
    }






}
