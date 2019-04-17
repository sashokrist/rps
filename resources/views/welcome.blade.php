
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                text-shadow: 0 0 8px blue;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="col-sm-12">
                    <img src="{{ asset('images/Rock.png') }}" alt="">
                    <img src="{{ asset('images/Paper.png') }}" alt="">
                    <img src="{{ asset('images/Scissor.png') }}" alt="">
                </div>
                <div class="title m-b-md">
                   Welcome To Rock, Paper Scissors!
                </div>
                <div>
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Register') }}</a>
                        @endif
                        @else
                        <a href="{{ url('game') }}" class="btn btn-primary">New Game</a>
                        <a href="{{ url('statistic') }}" class="btn btn-primary">Statistic</a>
                        <a href="{{ route('logout') }}" class="btn btn-primary"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        @endguest
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
