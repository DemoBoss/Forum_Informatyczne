<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function __construct()
    {

        $this->middleware('banned');
        $this->middleware('rank');

    }

    public function tworzenie_komentarza(Request $request){

    
        $opis = $request->validate(['opis'=> 'required|regex:/^[][a-zA-Z0-9]+$/u']);
        $postID = $request->input('postID');


        Comment::create([
            'content' => $opis['opis'],
            'post_id' => $postID,
            'user_id' => Auth::user()->id,
            'rating' => 0,

        ]);
        $komunikat = "Komentarz został dodany pomyślnie.";



        return back()->with(compact('komunikat'));


    }

    public static function go_to_comments($id){

        $posts = Post::where('id',$id)->first();
        $comments = Comment::where('post_id', $id)->latest()->paginate(5);
        $user = User::where('id', $posts->user_id)->first();
        $users = User::all();

        $likes = Like::all();
        $liked = false;


        return view('pages.odpowiedzi')->with(compact('posts','id', 'comments', 'users', 'user', 'likes', 'liked'));

    }

    public static function count_number_of_comments($user_id){
        $number = DB::table('comments')->where('user_id', $user_id)->count();
        return $number;
    }

    public static function getAvatar($user_avatar_id){
        $avatar = DB::table('avatars')->where('id', $user_avatar_id)->first();
        return $avatar->avatar;
    }


    public static function hand_up(Request $request){
        $id = $request->input('id');

        $fingerprint = $request->input('fingerprint');

        $fingerprintExists = false;

        $likes = Like::all();
        foreach($likes as $like){
            if($like['comment_id'] == $id && $like['fingerprint'] == $fingerprint){
                $fingerprintExists = true;
            }
        }



        if($fingerprintExists){
            return "Już oceniano";
        }else {

            $comment = Comment::where('id', $id)->first();

            $user_id = Auth::user()->id;

            Like::create([
                'user_id' => $user_id,
                'comment_id' => $id,
                'fingerprint' => $fingerprint,

            ]);

            $rating = $comment->rating;

            $return = $rating + 1;
            Comment::where('id', $id)->update(['rating' => $return]);


//        updateowanie rangi
            $id = $comment->user_id;

            $rating = Comment::where('user_id', $id)->sum('rating');

            if ($rating <= 2) {
                User::where('id', $id)->update(['rank_name' => 'Nowicjusz']);
            } else if ($rating > 2 && $rating <= 10) {
                User::where('id', $id)->update(['rank_name' => 'Zadziorny żółtodziób']);
            } else if ($rating > 10 && $rating <= 15) {
                User::where('id', $id)->update(['rank_name' => 'Znawca komputerów']);
            } else if ($rating > 15 && $rating <= 20) {
                User::where('id', $id)->update(['rank_name' => 'Weteran']);
            } else if ($rating > 20 && $rating <= 25) {
                User::where('id', $id)->update(['rank_name' => 'Nerd']);
            } else if ($rating > 25 && $rating <= 30) {
                User::where('id', $id)->update(['rank_name' => 'Władca bajtów']);
            } else if ($rating > 30) {
                User::where('id', $id)->update(['rank_name' => 'Piwniczak']);
            }


            return $return;
        }

    }





    public static function hand_down(Request $request){
        $id = $request->input('id');

        $comment = Comment::where('id', $id)->first();

        $fingerprint = $request->input('fingerprint');

        $user_id = Auth::user()->id;


        $fingerprintExists = false;

        $likes = Like::all();
        foreach($likes as $like){
            if($like['comment_id'] == $id && $like['fingerprint'] == $fingerprint){
                $fingerprintExists = true;
            }
        }



        if($fingerprintExists){
            return "Już oceniano";
        }else {


            Like::create([
                'user_id' => $user_id,
                'comment_id' => $id,
                'fingerprint' => $fingerprint,
            ]);

            $rating = $comment->rating;

            $return = $rating - 1;
            Comment::where('id', $id)->update(['rating' => $return]);

            $id = $comment->user_id;

            $rating = Comment::where('user_id', $id)->sum('rating');

            if ($rating <= 2) {
                User::where('id', $id)->update(['rank_name' => 'Nowicjusz']);
            } else if ($rating > 2 && $rating <= 10) {
                User::where('id', $id)->update(['rank_name' => 'Zadziorny żółtodziób']);
            } else if ($rating > 10 && $rating <= 15) {
                User::where('id', $id)->update(['rank_name' => 'Znawca komputerów']);
            } else if ($rating > 15 && $rating <= 20) {
                User::where('id', $id)->update(['rank_name' => 'Weteran']);
            } else if ($rating > 20 && $rating <= 25) {
                User::where('id', $id)->update(['rank_name' => 'Nerd']);
            } else if ($rating > 25 && $rating <= 30) {
                User::where('id', $id)->update(['rank_name' => 'Władca bajtów']);
            } else if ($rating > 30) {
                User::where('id', $id)->update(['rank_name' => 'Piwniczak']);
            }

            return $return;
        }
}


}
