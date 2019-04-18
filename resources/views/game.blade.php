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
                            <a href="{{ url('statistic') }}" class="btn btn-primary">Statistic</a>
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
                            <div class="alert res"><h3> </h3></div>
                            <div class="col-sm-8">
                                <form id="myForm">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Pick item</label>
                                        </div>
                                            <select class="custom-select" id="item">
                                                <option selected>Choose...</option>
                                                <option value="rock">Rock</option>
                                                <option value="paper">Paper</option>
                                                <option value="scissors">Scissors</option>
                                            </select>
                                    </div>
                                    <div class=" row justify-content-center">
                                        <button class="btn btn-primary btn-lg" id="ajaxSubmit">Play</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h2 class="row justify-content-center">Statistic</h2>
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Game Id</th>
                                    <th>Result</th>
                                    <th>Date</th>
                                </tr>
                                <tr>
                                    @foreach($games as $game)
                                        <td> {{ $game->user->name }} | <img src="/storage/avatars/{{ $game->avatar }}" height="60px;" width="60px;"></td>
                                        <td>{{ $game->id }}</td>
                                        <td>{{ $game->result }}</td>
                                        <td>{{ $game->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </table>
                            {{ $games->links() }}
                        </div>
                        <script>
                            jQuery(document).ready(function(){
                                jQuery('#ajaxSubmit').click(function(e){
                                    e.preventDefault();
                                    // alert('hi');
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: "{{ url('/game') }}",
                                        method: 'post',
                                        data: {
                                            name: $('#item').val()
                                        },
                                        success: function(result){
                                            console.log(result.result);
                                            if( result.result === 'Win'){
                                                $('.alert').show();
                                                $('.alert').html(result.result).addClass('dan');
                                            }
                                            else if( result.result === 'Lost'){
                                                $('.alert').show();
                                                $('.alert').html(result.result).addClass('suc');
                                            }
                                            else {
                                                $('.alert').show();
                                                $('.alert').html(result.result).addClass('def');
                                            }

                                            if(result.gameover){
                                                console.log('game over');
                                                $('.alert').show();
                                                $('.alert').html(result.gameover).addClass('dan');

                                                setTimeout(function() {
                                                    window.location.href = "gameover";
                                                }, 1000);
                                            }

                                        }}
                                    );
                                });
                                //
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
