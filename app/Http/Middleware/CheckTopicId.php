<?php

namespace App\Http\Middleware;

use App\Topic;
use Closure;
use phpDocumentor\Reflection\Types\Integer;

class CheckTopicId
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

        $topic = Topic::latest()->first();

        $id = $request->route('id');


        if(filter_var($id, FILTER_VALIDATE_INT) === false || $topic->id < $id){
            return redirect('/ups');
        }


        return $next($request);
    }
}
