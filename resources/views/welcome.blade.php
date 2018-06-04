<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Web Crawler : Square One</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="css/square1.css">

    </head>
    <body>
            @if (Route::has('login'))
            <header>
                <nav class="navbar">
                    @auth
                        <a href="#">
                            Hi {{ Auth::user()->name }} <span class="caret"></span>!
                        </a>
                        <a href="{{ route('wishlist') }}">Wishlist</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </nav>
            </header>            
            @endif
            <main>
                <h1>Laravel Web Crawler : Square One</h1>
                @if(session()->has('ok'))
                <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
                @endif
                @if(session()->has('notok'))
                <div class="alert alert-warning alert-dismissible">{!! session('notok') !!}</div>
                @endif
                <ul class="dishwashers-list">
                @foreach($dishwashers as $dish)
                <li class="dish-product">
                    <figure>
                        <img src="{{ $dish->image }}">
                        <figcaption>
                            <h2>{{ $dish->title }}</h2>
                            <h3>{{ $dish->price }}€</h3>
                        </figcaption>
                    </figure>
                    {!! Form::open(['url' => 'addwish', 'class' => 'form-dish form-hidden']) !!}
                        {!! Form::text('title', $dish->title)!!}
                        {!! Form::text('price', $dish->price) !!}
                        {!! Form::text('image', $dish->image) !!}
                        {!! Form::submit('Add to wishlist') !!}
                    {!! Form::close() !!}
                </li>
                @endforeach
            </ul>  
            </main>
            
    </body>
</html>
