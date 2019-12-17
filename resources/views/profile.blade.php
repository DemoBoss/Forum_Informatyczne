@extends('layouts.app')

{{--sekcja content--}}
@section('content')
    {{--pierwszy rząd--}}
<div class="row justify-content-center" style="margin-bottom: 40px">
    {{--logo i nazwa usera--}}
    <div class="col-lg-5 col-sm-8 kafelki" style="text-align: center;box-shadow:3px 3px 6px black;  padding-top: 20px; padding-bottom: 20px; ">
       {{--Avatar--}}
        <div style="text-align: center"><img id='avatar' src="{{$current_avatar}}" alt="icon" width="30%"></div><br>
        {{--zmiana avatara--}}
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#avatar_Change">
            Zmień Avatar
        </button>
        @if(session('change_avatar_status'))
            <div class="alert alert-success alert-dismissible" style="margin-top: 10px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('change_avatar_status')}}
            </div>
        @endif
        {{--pusty div --}}
    </div>


    {{--login i zmiana loginu--}}
    <div class="col-lg-5 col-sm-8 kafelki " style="box-shadow:3px 3px 6px black; padding-top: 20px; padding-bottom: 20px; text-align: center">

        <label class="label_login">Login</label><br>
        <label class="login_usera_label">{{Auth::user()->name}}</label><img data-toggle="modal" data-target="#login" class="edit_img img-fluid" style="min-width: 40px ;margin-left: 5%; padding: 10px" src="{{asset('images/pencil-edit-button.png')}}" alt="edit" width="7%">
    {{--errors jeśli źle wypełniono formularz--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
{{--drugi rząd--}}
<div class="row justify-content-center" style="margin-bottom: 40px">
    {{--ranga--}}
    <div class=" col-lg-5 col-sm-8 kafelki" style="text-align: center;box-shadow:3px 3px 6px black;  padding-top: 20px; padding-bottom: 20px;">
        {{--Napis "Ranga"--}}
        <div class="label_login" style="text-align: center; ">Ranga</div><i class='far fa-question-circle'  data-toggle="popover_ranga" style='font-size:24px'></i><br>
        {{--ranga usera--}}
        <label>{{$rank_name}}</label>
    </div>
    {{--pusty div --}}

    {{--rola usera--}}
    <div class="col-lg-5 col-sm-8 kafelki" style="min-width:200px ;box-shadow:3px 3px 6px black; padding-top: 20px; padding-bottom: 20px; text-align: center">

        <label class="label_login">Uprawnienia</label><br>
        <label class="login_usera_label">{{$role_name}}</label>

    </div>


</div>



{{--modal zmiany loginu--}}
<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Zmiana loginu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                {{--formularz logowania--}}
                <form action="change_login">
                    {{--pole na hasło--}}
                    <div class="form-group">
                        <label>Nowy login:  </label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    {{--przycisk potwierdzający formularz--}}
                    <button type="submit" class="btn btn-primary">Zmień</button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal zmiany avatara -->
<div class="modal fade" id="avatar_Change">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Avatar</h4>
                <p class="p"></p>
            </div>

            <!-- Modal body -->
            <div class="modal-body row">
                <div class="row col-12">


                {{--defaultowe avatary do wyboru--}}
                @foreach($all_avatars as $avatar)
                    <div class="col-4">
                        <div style="padding: 5px">
                        <img class="avatar" src="{{$avatar->avatar}}" alt="{{$avatar->id}}" width="100%" height="100%">
                        </div>
                    </div>
                @endforeach

                    <div style="margin-left: auto; margin-right: auto  ">
                        <form action="zmien_avatar">
                            <input class="save" type="hidden" name="avatar">
                            <button type="submit" class="btn btn-lg btn-primary" style="margin-top: 25px">Zapisz</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-body row">
                {{--aktualny avatar--}}
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
            </div>

        </div>
    </div>
</div>

    {{--tooltip script--}}
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

    {{--popover-ranga script--}}
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover_ranga"]').popover({
                title: "Rangi",
                html:true,
                animation:true,
                content:
                    "1. Nowicjusz<br/>" +
                    "2. Zadziorny żółtodziób<br/>" +
                    "3. Znawca komputerów<br/>" +
                    "4. Weteran<br/>" +
                    "5. Nerd<br/>" +
                    "6. Władca bajtów<br/>" +
                    "7. Piwniczak<br/>",
            });
        });
    </script>

    {{--script wyboru avatara--}}
    <script>
        $(document).ready(function(){

            $('img.avatar:first').css('box-shadow','5px 5px')
            $('input.save').val(1)

            $("img.avatar").click(function(){

                $('img.avatar').css('box-shadow','0px 0px')
                $(this).css('box-shadow', '5px 5px')
                $('input.save').val($(this).attr('alt'))

            });
        })
    </script>

@endsection