<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;

class CheckPostId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $post = Post::latest()->first();

        $id = $request->route('id');


        if(filter_var($id, FILTER_VALIDATE_INT) === false || $id > $post->id){
            return redirect('/ups');
        }



        return $next($request);
    }
}
