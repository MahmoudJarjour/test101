<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mood Test</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item active">
                    <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }} <span class="sr-only">(current)</span></a>
                </li>
                @endforeach

                    <li class="nav-item active">
                        <a class="nav-link" href="{{URL('\home')}}">Home<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{URL('offers\all')}}">{{__('messages.Display Offer')}}<span class="sr-only">(current)</span></a>
                    </li>


            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="{{__('messages.Search')}}" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('messages.Search')}}</button>
            </form>
        </div>
    </nav>


    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{__("messages.Home")}}</a>
                    @else
                        <a href="{{ route('login') }}">{{__("messages.Log in")}}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{__("messages.register")}}</a>
                        @endif
                    @endauth
                </div>
            @endif


            <div class="content full-height">
                <div class="title m-b-md">
                    {{__("messages.Display Offer")}}
                </div>


                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" >#</th>
                        <th scope="col">{{__("messages.offer Name")}}</th>
                        <th scope="col">{{__("messages.offer Price")}}</th>
                        <th scope="col">{{__("messages.offer Details")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($offers as $offer)
                    <tr>
                        <th scope="row">{{$offer -> id}}</th>
                        <td>{{$offer -> name}}</td>
                        <td>{{$offer -> price}}</td>
                        <td>{{$offer -> details}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        </div>
    </body>
</html>
