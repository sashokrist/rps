@extends('layouts.app')

@section('content')
    <div class="col-sm-12">

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
                <button class="btn btn-primary" id="ajaxSubmit">Play</button>
            </form>
        </div>
    </div>
    <div class="col-sm-12">
        <h2>All Games Results</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Result</th>
                <th>Date</th>
            </tr>
            <tr>
                @foreach($games as $game)
                    <td> {{ $game->user->name }}</td>
                    <td>{{ $game->result }}</td>
                    <td>{{ $game->created_at }}</td>
            </tr>
            @endforeach
        </table>
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

                    }}
                );
            });
            //
        });
    </script>
@endsection
