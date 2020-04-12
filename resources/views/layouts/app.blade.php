<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("partiels._head")
</head>
<body>

    <div class="container">

        <div class="row">
            <div class="col">
                {{-- @if (Auth::check()) --}}
                @auth
                    {{-- Welcome {{ Auth::user()->name }} --}}
                    <span>Welcome {{ Auth::user()->name }}</span>
                    {{-- <span>Welcome {{ auth()->user()->name }}</span> --}}

                    <a class="btn btn-link" href="{{ url('/home') }}">Profil</a>
                    <form action="{{ route('logout') }}" method="POST" class="form-inline d-inline-block">
                        @csrf
                        <input type="submit" value="Logout" class="btn btn-link form-control">
                    </form>
                @else
                    @if (Route::has('login'))                   
                    <a class="btn btn-link" href="{{ route('login') }}">Login</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="btn btn-link" href="{{ route('register') }}"color="teal">Create an account</a>
                    @endif
                @endauth
                {{-- @endif --}}
            </div>
        </div>

        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <h1>@yield("titre")</h1>
            </div>
        </div>
        
        @include("partiels._menu")
                    <div class="row">
            <div class="col">
                @if(\Session::has("success"))
                    <div class="alert alert-success">{{\Session::get("success")}}</div>
                @endif
            </div>
        </div>
        @yield("content")

    </div>

</body>
</html>
