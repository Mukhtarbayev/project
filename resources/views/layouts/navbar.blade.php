<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinks</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <script src="{{asset('script.js')}}"></script>
</head>

<body>
    <div class = "navigationbar">
        <div><img class = "logo" src="{{asset('logo.png')}}" alt="" onClick="parent.location='http://127.0.0.1:8000/{{__('lang.locale')}}/main'"></div>
        <div onmouseover="bigger(this)" onmouseout="smaller(this)" onClick="parent.location='http://127.0.0.1:8000/{{__('lang.locale')}}/types'">{{__('lang.types')}}</div>
        <div onmouseover="bigger(this)" onmouseout="smaller(this)" onClick="parent.location='http://127.0.0.1:8000/{{__('lang.locale')}}/cart'">{{__('lang.cart')}}</div>
        @if(Auth::check())
        <div class="dropdown" onmouseover="bigger(this)" onmouseout="smaller(this)">
            <button class="dropbtn" onClick="parent.location='http://127.0.0.1:8000/{{__('lang.locale')}}/profile'">{{__('lang.profile')}}</button>
            <div class="dropdown-content">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('lang.logout')}}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        @else
        <div class="dropdown" onmouseover="bigger(this)" onmouseout="smaller(this)">
            <button class="dropbtn">{{__('lang.sign')}}</button>
            <div class="dropdown-content">
                <a href="http://127.0.0.1:8000/login">{{__('lang.signin')}}</a>
                <a href="http://127.0.0.1:8000/register">{{__('lang.signup')}}</a>
            </div>
        </div>
        @endif
        <div onClick="getLanguage(this.id)" id="lang"><img value="{{__('lang.locale')}}" src="{{__('lang.srcimage')}}" width="60px" height="30px"></div>
    </div>
    <main>
            @yield('content')
    </main>
    </div>
</body>
</html>