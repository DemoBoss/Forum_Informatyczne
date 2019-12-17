@extends('layouts.app')

@section('content')


    @if(Auth::check() && Auth::user()->banned)

        {{--content jeśli user jest zbanowany--}}
        <div class="row justify-content-center" >
            <div class = "col-6 " style="text-align: center">
                <img class="img-fluid" src="images\stop.png" height="30%" width="30%">
                <div class="alert alert-danger" role="alert" style="margin-top: 20px">
                    <h1>Twoje konto zostało zablokowane.</h1> W celu odblokowania konta skontaktuj się z supportem napisz pod supportforum@forumkomputerowe.pl
                </div>
            </div>
        </div>

    @else
        @foreach($sections as $section)

            <div id="Temat" class="panel panel-default row justify-content-center col-6 mx-auto">
                <div class="panel-body" style="text-align: center">{{$section->name}}</div>
            </div>

            @foreach($topics as $topic)
                @if($topic->section_id == $section->id)

                    <a id="linki" href="{{$topic->id}}">
                        <div id="Post" class="col-lg-10 col-sm-12 row justify-content-center">
                            <div id="Icona" class="col-2">
                                <p><img  src="{{asset("images/arrowRight.png")}}" height="70%" width="70%"></p>
                            </div>

                            <div id="zawartosc-postu" class="col-lg-7 col-sm-12 panel panel-body">
                                <h1 id="first-line">{{$topic->name}}</h1>
                                <h2 id="Second-line">{{$topic->description}}</h2>
                            </div>

                            <div id="Ilosc_tematow-post" class="col-3">
                                <p style="margin-bottom: 5px;">Tematów:</p>
                                <p class="liczba-tematow">{{\App\Http\Controllers\welcome_Controller::count_number_of_posts($topic->id)}}</p>
                            </div>
                        </div>
                    </a>
                    </form>
                    @endif
                    @endforeach
                    @endforeach

                    </div>
                @endif

    <script>


        $(document).ready(function(){
            Fingerprint2.get(function (components){
                var murmur = Fingerprint2.x64hash128(components.map(function (pair) { return pair.value }).join(), 31)
                $("#fingerprint").text(murmur);
            })
        });

    </script>

@endsection


