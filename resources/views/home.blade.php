@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cube Summation</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="form-cube" action="" method="POST" role="form">
                        <legend>Cube Summation</legend>

                        <div id="section-input" class="form-group">

                            <label for="">Entrada</label>

                            <input type="text" class="form-control" id="entrance" placeholder="Input field">

                            <span id="helpBlock" class="help-block"></span>

                        </div>

                        {{ csrf_field() }}


                        <button id="submit" type="submit" class="btn btn-primary">Probar</button>
                    </form>


                    <div class="well">
                         
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function() {
        

        $("#submit").click(function(event) {
            /* Act on the event */

            event.preventDefault();
            
            make_request();

        });

    });

    function make_request (){

    
        $.ajax({

        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        url: 'request-cube-summation',
        type: 'POST',
        dataType: 'json',
        data: {  entrada : $("#entrance").val() },

        })
        .done(function( response ) {
            console.log("success");
            
            if( response.success ){

                

            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

    }
    

</script>
@endsection
