@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home page</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>You are logged in, welcom to your profile!</p>

                    <div class="col-md-2" style="text-align: center; border-radius: 50px;">
                    @if (Auth::user()->photo)
                        <a href="/profilpic/{{Auth::user()->photo}}"><img src="/profilpic/{{Auth::user()->photo}}" width="80px" height="80px" style="border-radius: 10px;"></img></a></br>
                    @elseif (Auth::user()->gender == "Homme")

                        <img src="/img/man.png" width="80px" height="80px"></img style="border-radius: 10px;"></br>
                    @else
                        <img src="/img/women.png" width="80px" height="80px"></img style="border-radius: 10px;"></br>
                    @endif
                        <a href="{{url('/')}}/changePic">Changer photo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection