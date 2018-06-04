<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Web Crawler : Wishlist</title>

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
                        <a href="{{ route('dishwashers') }}">Home</a>
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
            
            <main>
                @endif
                @if(session()->has('ok'))
                    <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
                @endif
                <h1>My wishlist</h1>
                <?php
                    if($dishwashers->isEmpty())
                    {
                        ?><div class="any-dish">You do not have any dishwashers in your wishlist</div><?php
                    }
                ?>
                <ul class="wishlist-list">
                    @foreach($dishwashers as $dish)
                    <li class="dish-product">
                        <figure>
                            <img src="{{ $dish->image }}">
                            <figcaption>
                                <h2>{{ $dish->title }}</h2>
                                <h3>{{ $dish->price }}€</h3>
                            </figcaption>
                        </figure>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['wishlist.destroy', $dish->id], 'class' => 'form-wish']) !!}
                            {!! Form::submit('Remove') !!}
                        {!! Form::close() !!}
                    </li>
                    @endforeach
                </ul>
            </main>  
    </body>
</html>
