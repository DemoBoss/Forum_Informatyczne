@extends('layouts.app')

@section('content')

    @foreach ($errors->all() as $error)
        <div class="row justify-content-center">
        <div style="text-align: center " class="alert alert-danger col-6">
        {{ $error }} Użyłeś niedozwolonych znaków!
        </div>
        </div>
    @endforeach

    @if(session('komunikat'))
        <div class="alert alert-success">
            {{session('komunikat')}}
        </div>
        @endif
    {{--zamknięcie postu--}}
    @if(Auth::check())
        @if(!$posts->closed)
            @if(Auth::user()->id == $user->id || Auth::user()->role_name == "Moderator" || Auth::user()->role_name == "Admin")

                <div style="text-align: right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#close_post">
                        Zamknij post
                    </button>
                </div>

            @endif
        @endif
    @endif
    {{--temat postu--}}
    <div id="Temat" class="panel panel-default" >
        <div class="panel-body" style="text-align: center">{{$posts->name}}</div>
    </div>

    {{--content postu wrac z info o userze--}}
    <div class="row">
    <div id="Post" class="col-4" style="max-height: 450px; min-width: 150px;">
        <div>
            <div><img class="img-fluid rounded mx-auto d-block" src="{{ \App\Http\Controllers\CommentController::getAvatar($user->avatar_id)}}" height="60%" width="60%"></div>
            <hr style="height: 3px; border:2px; background:  #1b1e21; border-radius: 30px">
            <div style="font-size: 20px; text-align: center"><b>{{$user->name}}</b></div>

            <div id="Second-line">{{$user->rank_name}}</div>
            <div id="Second-line">{{$user->role_name}}</div>
            <div id="Second-line">Ilość komentarzy: {{ \App\Http\Controllers\CommentController::count_number_of_comments($user->id)}}</div>
            <div style="text-align: center">
            @if(Auth::check() && (Auth::user()->role_name == 'Moderator' || Auth::user()->role_name == 'Admin') && !$user->banned)
                <form action="{{url('ban_user')}}">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <button class="btn btn-danger" type="submit">Banuj</button>
                </form>
            @endif
            @if($user->banned)
                <div class="alert alert-danger" role="alert">
                    Użytkownik zbanowany
                </div>
                @endif
            </div>
        </div>
    </div>
    <div id="TematContent" class="panel panel-default col-7">
        <div class="panel-body">{{$posts->content}}</div>
    </div>
    </div>

    <div class="container">
        @if(count($comments) == 0)
            {{--informacja o tym, że nie ma jeszcze komentarzy--}}
            <div class="jumbotron" style="font-size: 30px; margin-top: 40px; text-align: center">
                Nie ma tu jeszcze żadnych komentarzy. Bądź pierwszy. </br> Kliknij na "Dodaj komentarz".
            </div>
        @else
        @foreach($comments as $comment)

        <div class="row">
            @foreach($users as $user)
                @if($user->id == $comment->user_id)
            <div id="Post" class="col-4" style="max-height: 470px; min-width: 200px;">
                <div>
                    <div><img class="rounded mx-auto d-block"  src="{{ \App\Http\Controllers\CommentController::getAvatar($user->avatar_id)}}" height="60%" width="60%"></div>
                    <hr style="height: 3px; border:2px; background:  #1b1e21; border-radius: 30px">
                    <div id="Second-line" class="clickable" data-toggle="modal" data-target="#user" style="font-size: 20px"><b>{{$user->name}}</b></div>
                    <div id="Second-line">{{$user->rank_name}}</div>
                    <div id="Second-line">{{$user->role_name}}</div>


                    <p id="Second-line">Ilość komentarzy: {{ \App\Http\Controllers\CommentController::count_number_of_comments($user->id)}}</p>

                    <div style="text-align: center">
                    @if(Auth::check() && (Auth::user()->role_name == 'Moderator' || Auth::user()->role_name == 'Admin') && !$user->banned)
                        <button class="btn btn-danger btn-ban" data-toggle="modal" about="{{$user->name}}" name="{{$user->id}}" data-target="#ban_user" type="submit">Banuj</button>

                        @endif
                    @if($user->banned)
                        <div class="alert alert-danger" role="alert">
                            User zbanowany
                        </div>
                    @endif
                    </div>



                </div>
            </div>

                @endif
            @endforeach
            <div style="position: relative" id="Post" class="col-6 col-lg-7">
                <p>{!! $comment->content !!}</p>

               <div style="position: absolute; bottom: 2px; font-size: 11px">Utworzono: {{$comment->created_at}}</div>


                {{--łapki--}}
                <div class="row">
                @if(Auth::check())
                    @foreach($likes as $like)

                            @if($like['user_id'] == Auth::user()->id && $like['comment_id'] == $comment->id)
                                    <?php
                                    $liked = true;
                                ?>
                                @endif
                        @endforeach
                        @if($liked)
                        <div class="row parent" style="position: absolute; bottom: 2px;; right: 20px;">
                            <button class="up btn btn-info" style="background: none; border:none" about="{{$comment->id}}" disabled title="Dodałeś już ocenę"><i class='far fa-thumbs-up up' style='font-size:36px; cursor: pointer'></i></button>
                            <div class="mid" style="margin:5px; font-size: 20px">{{$comment->rating}}</div>
                            <button  class="down btn btn-info" style="background: none; border:none" about="{{$comment->id}}" disabled title="Dodałeś już ocenę"> <i class='far fa-thumbs-down down' style='font-size:36px; cursor: pointer'></i></button>
                        </div>
                        @else
                        <div class="row parent" style="position: absolute; bottom: 2px;; right: 20px;">
                            <button class="up btn btn-info" style="background: none; border:none" about="{{$comment->id}}"><i class='far fa-thumbs-up up' style='font-size:36px; cursor: pointer'></i></button>
                            <div class="mid" style="margin:5px; font-size: 20px">{{$comment->rating}}</div>
                            <button  class="down btn btn-info" style="background: none; border:none" about="{{$comment->id}}"> <i class='far fa-thumbs-down down' style='font-size:36px; cursor: pointer'></i></button>
                        </div>
                        @endif

                @endif
                </div>
            </div>

        </div>

            <?php
            $liked = false;
            ?>

        @endforeach
        @endif
    </div>

    {{--paginacja--}}
    <div id="Paginator" class="row justify-content-center">{{$comments->links()}}</div>


        {{--dodawanie komantarzy--}}
        <div class="row justify-content-center" style="padding: 20px;">
            @if(Auth::check())
                @if($posts->closed)

                    <div class="alert alert-danger" role="alert" style="background-color: #761b18; color: white">
                        Post został zamknięty.
                    </div>
                @else
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalComment">
                Dodaj komentarz
            </button>
                @endif
            @else
                <div class="alert alert-danger" role="alert" style="background-color: #761b18; color: white">
                Tylko &nbsp;<b><a  href="{{route('login')}}"> ZALOGOWANI </a></b>&nbsp; użytkownicy mogą udzielać się na forum,
                jeśli nie masz jeszcze konta&nbsp; <b><a  href="{{ route('register') }}">ZAREJESTRUJ SIĘ </a></b>.
                </div>
            @endif
        </div>


    {{--modal do potwierdzenia zamknięcia postu--}}
    <div class="modal fade" id="close_post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Czy na pewno chcesz zamknąć temat?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                    <div class="modal-body">
                        <form action="/close_post">
                            <label>Wpisz: "zamknij"</label>
                            <div class="form-group row justify-content-center">

                                <input type="text" class="form-control zamknij col-4 ">
                            </div>
                            <input type="hidden" name="post_id" value="{{$posts->id}}">
                            <div class="row justify-content-center"><button type="submit" class="btn btn-success btn-zamknij" disabled>Zamknij</button></div>
                        </form>
                    </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    {{--script sprawdzający poprawność wpisanego wyrażenia w potwierdzeniu zamknięcia tematu--}}


    <script>
        $(document).ready(function(){
            $(".zamknij").on("keyup", function() {
                var value = $(this).val();
                if(value == 'zamknij'){
                    $('.btn-zamknij').prop("disabled", false);
                }else{
                    $('.btn-zamknij').prop("disabled", true);
                }
            });
        });
    </script>


    {{--//modal do potwierdzenia zbanowania usera--}}
    <div class="modal fade" id="ban_user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title user_name"> </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <label>Wpisz "banuj": </label>
                    <input class="for_banuj" type="text">
                    <form action="{{url('/ban_user')}}">
                        <input class="for_id" name="user_id" type="hidden">
                        <button class="btn_for_ban" type="submit" disabled>Banuj</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                </div>

            </div>
        </div>
    </div>

    {{--script do przesłania danych do modala ban user--}}
    <script>
        $(document).on("click", ".btn-ban", function () {
            var user_name = $(this).attr('about');
            var user_id = $(this).attr('name');
            $('.user_name').text("Czy na pewno chcesz zbanować użytkownika "+user_name+" ?");
            $('.for_id').val(user_id);
        });
    </script>


    {{--script sprawdzający poprawność wpisanego wyrażenia w input--}}
    <script>
        $(document).ready(function(){
            $(".for_banuj").on("keyup", function() {
                var value = $(this).val();
                if(value == 'banuj'){
                    $('.btn_for_ban').prop("disabled", false);
                }else{
                    $('.btn_for_ban').prop("disabled", true);
                }
            });
        });
    </script>



    {{--Modal do tworzenia komentarza--}}
    <div class="modal fade" id="myModalComment">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tworzenie komentarza</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Two -->
                <div class="modal-body">
                    <form action="/tworzenie_komentarza">
                        <label>Wprowadź komentarz:</label>
                        <div class="form-group row justify-content-center">

                            <textarea name="opis" class="form-control" style="width: 450px; height: 200px;" required onsubmit="return validation()" ></textarea>
                        </div>
                        <input type="hidden" name="postID" value="{{$id}}">
                        <input class="fingerprint" type="hidden" name="fingerprint">
                        <div class="row justify-content-center"><button type="submit" class="btn btn-success " >Dodaj</button></div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <script>


        $(document).ready(function() {
            var fingerprint;
            Fingerprint2.get(function (components){
                fingerprint = Fingerprint2.x64hash128(components.map(function (pair) { return pair.value }).join(), 31);
                $('input.fingerprint').val(fingerprint)
            });




            $('button.up').click(function () {
                var thit = $(this);
                var id = thit.attr('about');



                $.get('{{url('/hand_up')}}', {id: id, fingerprint: fingerprint}, function (data) {
                    thit.parent('div').children('div').html(data);
                });

                $(this).attr('disabled', 'true');
                $(this).parent('div.parent').children('button.down').attr('disabled', 'true');


            });


            $('button.down').click(function () {
                var thit = $(this);
                var id = thit.attr('about');


                    $.get('{{url('/hand_down')}}', {id: id, fingerprint:fingerprint}, function (data) {
                        thit.parent('div').children('div').html(data);
                    });

                    $(this).attr('disabled', 'true');
                    $(this).parent('div.parent').children('button.up').attr('disabled', 'true');



            })

        })

    </script>

@endsection