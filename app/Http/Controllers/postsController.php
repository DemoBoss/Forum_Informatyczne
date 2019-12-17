<?php

namespace App\Http\Controllers;

use App\Post;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class postsController extends Controller
{

    public function __construct()
    {

        $this->middleware('banned');
        $this->middleware('rank');

    }

    public function go_to_posts(Request $request, $id){


        $posts = DB::table('posts')->where('topic_id', $id)->latest()->paginate(5);




        return view('pages.posts')->with(compact('posts','id'));
    }

    public function tworzenie_postu(Request $request){

        $topic = $request->validate(['topic' => 'required']);
        $opis = $request->validate(['opis'=> 'required']);
        $tematid = $request->input('topicid');
        $posts = DB::table('posts')->where('topic_id', $tematid)->latest()->paginate(5);

        Post::create([
            'name' => $topic['topic'],
            'content' => $opis['opis'],
            'topic_id' => $tematid,
            'user_id' => Auth::user()->id,
            'closed' => false,
        ]);

        $komunikat = "Post został stworzony pomyślnie.";



        return back()-> with(compact('komunikat','posts'));


    }

    public static function count_number_of_comments($post_id){
        $number = DB::table('comments')->where('post_id', $post_id)->count();
        return $number;
    }


    public function close_post(Request $request){

        $post_id = $request->input('post_id');
        Post::where('id', $post_id)->update(['closed' => 1]);

        $komunikat = "Temat został zamknięty";

        return back()->with(compact('komunikat'));
    }


}
