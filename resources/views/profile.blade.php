@extends('layouts.app')

@section('content')
    <h3>{{ $user->name }}'s game results</h3>
    <h3>User Experience: <strong>{{ $user->level->level }}</strong></h3>
    <h3>Roles: </h3>
    <ul>
        @foreach($user->roles as $role)
            <li><strong>{{ $role->name }}</strong></li>
            @endforeach
    </ul>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Result</th>
            <th>Date</th>
        </tr>
        <tr>
            @foreach($user->games as $game)
                <td>{{ $game->user_id }}</td>
                <td>{{ $game->user->name }}</td>
                <td>{{ $game->result }}</td>
                <td>{{ $game->created_at }}</td>
        </tr>
        @endforeach
    </table>
    @endsection

