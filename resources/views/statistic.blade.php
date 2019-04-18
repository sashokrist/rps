@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-12">
                            <a href="/profile">
                                <img class="rounded-circle" src="/storage/avatars/{{ auth()->user()->avatar }}" height="100px;" width="100px;"  alt="Upload avatar"/></a>
                            <a href="{{ url('game') }}" class="btn btn-primary">New Game</a>
                            <a href="{{ url('home') }}" class="btn btn-primary">Profile</a>
                            <h2 class="row justify-content-center">Welcome</h2>
                            <h2 class="row justify-content-center"><strong> {{ auth()->user()->name }}</strong></h2>
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="{{ asset('images/Rock.png') }}" alt="">
                                    <img src="{{ asset('images/Paper.png') }}" alt="">
                                    <img src="{{ asset('images/Scissor.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12"><hr>
                            <h2 class="row justify-content-center">All Games Results</h2>
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Game Id</th>
                                    <th>Result</th>
                                    <th>Date</th>
                                </tr>
                                <tr>
                                    @foreach($games as $game)
                                        <td> {{ $game->user->name }} | <img src="/storage/avatars/{{ $game->avatar }}" height="60px;" width="60px;">
                                        </td>
                                        <td>{{ $game->id }}</td>
                                        <td>{{ $game->result }}</td>
                                        <td>{{ $game->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </table>
                            {{ $games->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
