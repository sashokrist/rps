@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>
                <div class="card-body">
                    <a href="{{ url('game') }}" class="btn btn-primary btn-lg">PLAY NEW GAME</a>
                        <h3>Welcome {{ $user->name }}, your game results</h3>
                        <h3>User Experience: <strong>{{ $user->level->level }}</strong></h3>
                        <h3>Roles: </h3>
                        <ul>
                            @foreach($user->roles as $role)
                                <li><strong>{{ $role->name }}</strong></li>
                            @endforeach
                        </ul>
                    @foreach($user->games as $game)
                        {{ $game->id }};
                        @endforeach
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Game Id</th>
                            <th>Name</th>
                            <th>Your choice</th>
                            <th>PC choice</th>
                            <th>Result</th>
                            <th>Date</th>
                        </tr>
                        <tr>
                            @foreach($rounds as $round)
                                <td>{{ $round->user_id }}</td>
                                <td>{{ $round->game_id }}</td>
                                <td>{{ $round->name }}</td>
                                <td>{{ $round->user_choice }}</td>
                                <td>{{ $round->computer }}</td>
                                <td>{{ $round->result }}</td>
                                <td>{{ $round->created_at }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
