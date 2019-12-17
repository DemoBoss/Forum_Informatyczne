@extends('layouts.app')


@section('content')





    <div id="Post">
        <div class=" row row justify-content-center">
            <div id="Icona" class="col-2">
                <p><img src="{{asset("images/note.png")}}" height="100%" width="100%"></p>
            </div>
            <label for="exampleFormControlTextarea1">Napisz swoją odpowiedź:</label>
            <form action="{{route('CommentController@commentCreateComment')}}" method="post">
            <div id="zawartosc-postu" class="col-lg-8 col-md-12 panel panel-body">

                <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>


        <br>
        <div class="row justify-content-center">
            <a href="/odpowiedzi"> <button type="submit" class="btn btn-success">Wyślij</button> </a>
            <input type="hidden" value="{{Session::token()}}" name="_token">
        </div>
        </form>
    </div>





@endsection