@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card row justify-content-center">
                    <div class="card-body">
                        <div class="col-sm-12">
                            <h1 class="row justify-content-center">GAME OVER</h1>
                            <h2 class="row justify-content-center">YOU:</h2>
                            @if($games->result == 'WIN')
                                <h2 class="row justify-content-center"><strong>{{ $games->result }}</strong></h2>
                                <img class="rounded-circle img-fluid mx-auto d-block" src="{{ asset('images/winner.jpg') }}" alt="" style="padding-bottom: 20px;">
                            @else
                                <h2 class="row justify-content-center"><strong>{{ $games->result }}</strong> </h2>
                                <img class="rounded-circle img-fluid mx-auto d-block" src="{{ asset('images/loser.jpg') }}" alt="" style="padding-bottom: 20px;">
                            @endif
                            <div class="text-center">
                                <a href="{{ url('welcome') }}" class="btn btn-primary btn-lg">Home</a>
                                <a href="{{ url('game') }}" class="btn btn-primary btn-lg">New Game</a>
                                <a href="{{ url('home') }}" class="btn btn-primary btn-lg">Profile</a>
                                <a href="{{ url('statistic') }}" class="btn btn-primary btn-lg">Statistic</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

