@extends('layouts.app')

@section('content')
    {{--pierwszy rząd--}}
    <div class="row justify-content-center" style="margin-bottom: 40px">
        {{--logo i nazwa usera--}}
        <div class="col-lg-5 col-sm-8 kafelki" style="text-align: center;box-shadow:3px 3px 6px black;  padding-top: 20px; padding-bottom: 20px; margin-left: 4%">
            <p><img src="{{asset("images/boss.png")}}" height="30%" width="30%"></p>
            {{--napis 'moderatorzy'--}}
            <label class="label_login">Moderatorzy</label><br><br>
            {{--zarządzanie moderatorami--}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#moderator">
                Zarządzaj
            </button>
            {{--informacje na temat zarządzania moderatorami--}}
        @if(session('status'))
                <div class="alert alert-success alert-dismissible" style="margin-top: 10px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('status')}}
                </div>
            @endif
        </div>



        {{--Zarządzanie tematami--}}
        <div class="col-lg-5 col-sm-8 kafelki" style="box-shadow:3px 3px 6px black; padding-top: 20px; padding-bottom: 20px; text-align: center">
            <p><img src="{{asset("images/topic.png")}}" height="30%" width="30%"></p>
            <label class="label_login">Tematy</label><br><br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tematy">
                Zarządzaj
            </button>
            @if(session('status_topic'))
                <div class="alert alert-success alert-dismissible" style="margin-top: 10px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('status_topic')}}
                </div>
            @endif
            @foreach ($errors->all() as $error)
                <div class="alert alert-success alert-dismissible" style="margin-top: 10px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{$error}}
                </div>
            @endforeach
        </div>
    </div>

    {{--drugi rząd--}}
    <div class="row justify-content-center" style="margin-bottom: 40px">
{{--zarządzanie userami--}}
        <div class="col-lg-5 col-sm-8 kafelki " style="text-align: center;box-shadow:3px 3px 6px black;  padding-top: 20px; padding-bottom: 20px; margin-left: 4%">
            <p><img src="{{asset("images/user.png")}}" height="30%" width="30%"></p>
            {{--napis 'moderatorzy'--}}
            <label class="label_login">Użytkownicy</label><br><br>
            {{--zarządzanie moderatorami--}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user">
                Zarządzaj
            </button>

            @if(session('komunikat'))
                <div class="alert alert-success alert-dismissible" style="margin-top: 10px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('komunikat')}}
                </div>
            @endif
        </div>


    </div>


{{--modal do zarządzania maderatorami--}}
    <div class="modal fade " id="moderator">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Moderatorzy</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body row">
                   <p style="margin-left: 20px">Lista moderatorów</p>
                    {{--tabela z moderatorami--}}
                    <div class="col-12" style="height: 250px; overflow:auto;">
                        <table class="table table-hover" style="height: 50%">
                            <thead>
                            <tr>
                                <th>Login</th>
                                <th>Email</th>
                                <th style="text-align: right">Usuń</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mods as $moderator)
                            <tr>
                                <td>{{$moderator->name}}</td>
                                <td>{{$moderator->email}}</td>
                                <td><form action="usun_moderatora">
                                        <input type="hidden" name="login" value="{{$moderator->name}}">
                                        <button type="submit" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
                {{--formularz dodawanie nowego moderatora--}}
                <div class="modal-body row">
                    <div class="col-12">
                        <label>Nowy moderator</label>
                        <form action="nowy_moderator">
                            <label>Wpisz login użytkownika: </label>
                            <input class="form-control" id="myInput" type="text" placeholder="Szukaj.."><br/>
                            <input class="hid" type="hidden" name="user_id">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Login</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach($users as $user)
                                <tr class="rzad" about="{{$user->id}}">
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </form>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
                </div>

            </div>
        </div>
    </div>


    {{--modal do zarządzania tematami--}}
    <div class="modal fade " id="tematy">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tematy</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h3>Tworzenie tamatu</h3>
                    <form action="stworz_temat">
                        <label>Nazwa tematu: </label>
                        <input type="text" name="name" required></br>
                        <label>z opisem :</label></br>
                        <textarea class="form-control justify-content-center" rows="3"  name="opis" required></textarea></br>
                        <label>Będzie znajdował się w: </label>
                        <select class="form-control" name="section">
                            @foreach($sections as $section)
                                <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class=" btn btn-primary" style="margin-top: 10px">Stwórz</button>
                    </form>
                </div>


                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
                </div>

            </div>
        </div>
    </div>

    {{--modal do zarządzania userami--}}
    <div class="modal fade " id="user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tematy</h4>
                </div>

                <!-- Modal body -->
                <div  class="modal-body row table-responsive">
                    <h3>Lista userów</h3>
                    <input class="form-control" id="myInput2" type="text" placeholder="Search..">
                    <table  class="table table-hover" style="height: 50%">
                        <thead class="col-6">
                        <tr>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Rola</th>
                            <th>Ranga</th>
                            <th style="text-align: right">Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="myTable2">
                        @foreach($all_users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role_name}}</td>
                                <td>{{$user->rank_name}}</td>
                                @if($user->banned)
                                    <td>Zbanowany</td>
                                    <td><form action="{{url('/unban')}}">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <button class="btn btn-info" type="submit">Odbanuj</button>
                                        </form></td>
                                    @else
                                    <td></td>
                                    <td><form action="{{url('/ban_user')}}">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <button class="btn btn-info" type="submit">Zbanuj</button>
                                        </form></td>
                                    @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
                </div>

            </div>
        </div>
    </div>


    {{--sciript filtrujący tabelę userów--}}
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#myInput2").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable2 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    {{--script do zaznaczania usera w tabeli--}}
    <script>
        $(document).ready(function(){
            // defaultowe ustawienie zaznaczenia na pierwszy rząd tabeli
            $("tr.rzad:first").addClass('table-primary')
            $('input.hid').val($('tr.rzad:first').attr('about'))

            // zaznaczanie innego rzędu onclick
            $("tr.rzad").click(function(){
                // pobieranie id usera
                $('input.hid').val($(this).attr('about'))

                // kolorowanie klikniętego rzędu
                $('tr.rzad').removeClass('table-primary')
                $(this).addClass('table-primary')
            });
        })
    </script>



@endsection