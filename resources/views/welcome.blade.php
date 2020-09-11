<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background : url("./images/school.jpg");
                background-repeat: no-repeat;
                background-size : cover;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                font-weight: 600;
                color : white;
                text-shadow: 2px 2px black;
            }

            .links > a {
                color: white;
                font-size: 25px;
                border-radius : 15px;
                padding : 20px 50px 20px 50px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 80px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="title m-b-md">
                    Smart School Supplies Vending Machine
                </div>

                @if (Route::has('login'))
                    <div class="links">
                        @auth
                            <a class="btn btn-danger" href="{{ url('/home') }}">Go To Manangement</a>
                        @else
                            <a class="btn btn-danger" href="{{ route('login') }}">Login</a>

                            <!-- @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif -->
                        @endauth 
                    </div>
                @endif

                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
    </body>
</html>
