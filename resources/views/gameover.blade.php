@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert res"><h3> </h3></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card row justify-content-center">
                    <div class="card-body">
                        <h1 class="row justify-content-center">GAME OVER</h1>
                        <h2 class="row justify-content-center">YOU:  <strong>{{ $games->result }}</strong> </h2>
                        <a href="{{ url('welcome') }}" class="btn btn-primary btn-lg">Home</a>
                        <a href="{{ url('game') }}" class="btn btn-primary btn-lg">New Game</a>
                        <a href="{{ url('home') }}" class="btn btn-primary btn-lg">Profile</a>
                        <a href="{{ url('statistic') }}" class="btn btn-primary btn-lg">Statistic</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function(){
                $.ajax({
                    success: function(result){
                        if(result.gameover){
                            console.log('game over');
                            //$('.alert').show();
                        }

                    }}
                );
            });
    </script>
    @endsection
