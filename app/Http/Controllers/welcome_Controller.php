<?php

namespace App\Http\Controllers;

use App\Section;
use App\Topic;
use Illuminate\Support\Facades\DB;


class welcome_Controller extends Controller
{


    public function __construct()
    {
       // $this->middleware('rank');
    }

    public function welcome(){

        $sections = Section::get();
        $topics = Topic::get();

        return view('welcome', compact('sections', 'topics'));
    }

    public static function count_number_of_posts($topic_id){
        $number = DB::table('posts')->where('topic_id', $topic_id)->count();
        return $number;
    }


}
