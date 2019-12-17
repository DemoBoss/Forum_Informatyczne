@extends('layouts.app')

@section('content')



    @if(Auth::check())
    @if(session('komunikat'))
        <div class="alert alert-success alert-dismissible" style="margin-top: 10px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('komunikat')}}
        </div>
    @endif
    <!-- Button to Open the Modal -->
    <div style="text-align: right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Stwórz nowy post
    </button>
    </div>
    @endif





    @if(count($posts) == 0)
        <div class="jumbotron" style="font-size: 30px; margin-top: 40px; text-align: center">
            Nie ma tu jeszcze żadnych postów. Bądź pierwszy. </br> Kliknij na "Stwórz nowy post".
        </div>
    @else
        @foreach($posts as $post)
            <a id="linki" href="/post/{{$post->id}}">
                <div id="Post" class="col-lg-10 col-sm-12 row justify-content-center">
                    <div style="min-width: 100px " id="Icona" class="col-2">
                        <p> <img  src="{{asset("images/arrowRight.png")}}" class="img-fluid" alt="Responsive image"></p>
                    </div>
                    <div class="col-lg-6 col-sm-12 ">
                        <div class="row justify-content-center" style="margin-top: 20px">
                            <h2>{{$post->name}}</h2>
                        </div>
                        {{--content postu--}}
                        <div id="zawartosc-postu" class="panel panel-body justify-content-center">
                            {{$post->content}}
                        </div>
                        @if($post->closed)
                            <div class="alert alert-danger" role="alert" style="background-color: #761b18; color: white; border-radius: 20px; text-align: center">
                                Post został zamknięty.
                            </div>
                        @endif
                    </div>
                    {{--informacje o poście   --}}

                    <div id="Ilosc_odpowiedzi-post" class="col-lg-2 col-sm-12">
                        <p style="margin-bottom: 5px; margin-top: 25px">Odpowiedzi:</p>
                        <p class="liczba-odpowiedzi">{{ \App\Http\Controllers\postsController::count_number_of_comments($post->id) }}</p>
                    </div>

                    <div id="Ilosc_odpowiedzi-post" class="col-lg-2 col-sm-12">
                        <p>Data utworzenia:</p>
                        <p class="liczba-odpowiedzi">{{$post->created_at}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    @endif

    <div id="Paginator" class="row justify-content-center">{{$posts->links()}}</div>

    {{--Modal do tworzenia postu--}}
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tworzenie postu</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Tworzenie postu modal -->
                <div class="modal-body">
                    <form action="/tworzenie_postu">
                        <div class="form-group">
                            <label>Podaj temat:</label>
                            <input type="text" name="topic" class="form-control" id="topic" required>
                        </div>
                        <label>Wprowadź opis:</label>
                        <div class="form-group row justify-content-center">
                            <textarea style="width: 450px; height: 200px;" name="opis" class="form-control" rows="5" id="comment" required></textarea>
                        </div>
                        <input type="hidden" name="topicid" value="{{$id}}">
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </div>

                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection