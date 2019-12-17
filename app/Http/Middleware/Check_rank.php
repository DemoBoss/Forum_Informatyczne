<?php

namespace App\Http\Middleware;

use App\Comment;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class check_rank
{

    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;

            $rating = Comment::where('user_id', $user_id)->sum('rating');

            if($rating <= 2){
                User::where('id', $user_id)->update(['rank_name' => 'Nowicjusz']);
            }else if($rating > 2 && $rating <= 10){
                User::where('id', $user_id)->update(['rank_name' => 'Zadziorny żółtodziób']);
            }else if($rating > 10 && $rating <= 15){
                User::where('id', $user_id)->update(['rank_name' => 'Znawca komputerów']);
            }else if($rating > 15 && $rating <= 20){
                User::where('id', $user_id)->update(['rank_name' => 'Weteran']);
            }else if($rating > 20 && $rating <= 25){
                User::where('id', $user_id)->update(['rank_name' => 'Nerd']);
            }else if($rating > 25 && $rating <= 30){
                User::where('id', $user_id)->update(['rank_name' => 'Władca bajtów']);
            }else if($rating > 30){
                User::where('id', $user_id)->update(['rank_name' => 'Piwniczak']);
            }


        }





        return $next($request);
    }
}
