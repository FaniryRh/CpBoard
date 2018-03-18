@extends('layouts.app')


@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mon profile</div>
                <div class="panel-body">

                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Photo de profile</div>
                            <div class="panel-body" style="text-align: center;">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block" id="alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                @if (count($errors) > 0)

                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (Auth::user()->photo)
                                    <a href="/profilpic/{{Auth::user()->photo}}">
                                        <img width="200"
                                                                                      src="/profilpic/{{Auth::user()->photo}}"
                                                                                      style="border-radius: 5px; border: solid 1px #CCC;
    -moz-box-shadow: 5px 5px 0px #999;
    -webkit-box-shadow: 5px 5px 0px #999;
        box-shadow: 5px 5px 0px #999;"></img></a></br>
                                @elseif (Auth::user()->gender == "Homme")

                                    <img src="/img/man.png" width="80px" height="80px"></img style=
                                    "border-radius: 10px
                                    ;"></br>
                                @else
                                    <img src="/img/women.png" width="80px" height="80px"></img style=
                                    "border-radius: 10px
                                    ;"></br>
                                    @endif
                                    </br>
                                    <a data-toggle="modal" href="#myModal" class="btn btn-warning">Changer photo</a>
                                    <a data-toggle="modal" href="#myModal" class="btn btn-primary">Ajouter</a>
                                    <a data-toggle="modal" href="#myModal" class="btn btn-danger">Message</a>

                            </div>
                        </div>
                    </div>





                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Informations</div>
                            <div class="panel-body">



                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Changer de photo</h4>
                </div>
                <div class="modal-body">


                    {!! Form::open(array('route' => 'resizeImagePost','enctype' => 'multipart/form-data')) !!}
                    <div class="row">

                        <div class="col-md-12">
                            <img src="" id="profile-img-tag2" width="200px"/>
                            <br/>
                            {!! Form::file('image', array('class' => 'image', 'id' => 'profile-img2')) !!}
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Telecharger l'image</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





    <script type="text/javascript">
        $('#test').click(function () {
            $('#exampleModal').modal();
        });

        $("#alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-dismissible").alert('close');
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profile-img-tag2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile-img2").change(function () {
            readURL2(this);
        });
    </script>
@endsection