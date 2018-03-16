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
                    
                    <p>Telecharger une image:</p>
                    @if($exist == 1)
                            <div class="alert alert-danger">
                                <strong>{{ $noFileMessage }}</strong>
                            </div>
                    @endif
                    <div class="col-md-2" style="text-align: center; border-radius: 50px;">
                        @if (Auth::user()->photo)
                            <a href="/profilpic/{{Auth::user()->photo}}"><img src="/profilpic/{{Auth::user()->photo}}" width="100px" height="100px" style="border-radius: 10px;"></img></a></br>
                        @elseif (Auth::user()->gender == "Homme")

                            <img src="/img/man.png" width="100px" height="100px"></img style="border-radius: 10px;"></br>
                        @else
                            <img src="/img/women.png" width="100px" height="100px"></img style="border-radius: 10px;"></br>
                        @endif
                            <hr>
                        
                    </div>
                    <div class="col-md-5">
                        <form action="{{url('/')}}/uploadPic" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"></input>
                            <input type="file" name="pic" class="form-control"></input></br>
                            <input type="submit" class="btn btn-default" name="btn" value="Enregistrer"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection