@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <a href="{{ url('welcome') }}" class="btn btn-primary btn-lg">Home</a>
                        <a href="{{ url('game') }}" class="btn btn-primary btn-lg">New Game</a>
                        <a href="{{ url('statistic') }}" class="btn btn-primary btn-lg">Statistic</a>
                    </div>
                        <h2 class="row justify-content-center">Welcome {{ $user->name }}, your game results</h2>
                    <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="100px;" height="100px;" alt="Upload avatar" />
                    <a href="profile" class="btn btn-primary">Upload image</a>
                    <table>
                        <tr>
                            <th>Game Id</th>
                            <th>Your choice</th>
                            <th>PC choice</th>
                            <th>Result</th>
                            <th>Count</th>
                            <th>Date</th>
                        </tr>
                        <tr>
                            @foreach($rounds as $round)
                                <td>{{ $round->game_id }}</td>
                                <td>{{ $round->user_choice }}</td>
                                <td>{{ $round->computer }}</td>
                                <td>{{ $round->result }}</td>
                                <td>{{ $round->count }}</td>
                                <td>{{ $round->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $rounds->links() }}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                <h2 class="row justify-content-center">This game result</h2>
                <table>
                    <tr>
                        <th>Game Id</th>
                        <th>Your choice</th>
                        <th>PC choice</th>
                        <th>Result</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        @foreach($countRow as $roundR)
                            <td>{{ $roundR->game_id }}</td>
                            <td>{{ $roundR->user_choice }}</td>
                            <td>{{ $roundR->computer }}</td>
                            <td>{{ $roundR->result }}</td>
                            <td>{{ $roundR->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
