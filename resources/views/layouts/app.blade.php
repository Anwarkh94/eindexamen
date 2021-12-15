<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @if(auth()->check())
                      <ul class="navbar-nav mr-auto">
                        @if (auth()->user())
                            <li class="nav-item">
                                <a class="nav-link" href="#">Gebruikers</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categorieenController@index')}}">Categorieën</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('spellenController@index')}}">Spellen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">overzicht</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('spellendevController@index')}}">Spellen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profiel</a>
                        </li>
                    </ul>
                      @endif  
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
                <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script> --}}
    <script src="{{ asset('toJson.js') }}"></script>
    <script>
        var SHOW_FORM_VALIDATION_ERRORS = function($Form, errors) {
            // BS_H.RESET_FORM_VALIDATION_ERRORS($Form, errors)
            var _FOCUS_ = true;
            var hidden_inputs_errors = '';
            $.each(errors, function (input_name, messgaes) {
                input_name = input_name.replace(/\.(.+?)(?=\.|$)/g, (m, s) => `[${s}]`);
                var _INPUT_ = $Form.find("[name^='"+ input_name + "']");
                // if (_INPUT_.attr('type') == 'hidden') {
                //     hidden_inputs_errors += messgaes[0] + "<br>";
                // }
                // else {
                    if (_INPUT_.data('on-validation-error-click')) {
                        $(_INPUT_.data('on-validation-error-click')).click();
                    }
                    _INPUT_.addClass('is-invalid');
                    _INPUT_.parent().append(`<div class="invalid-feedback" style="display: block">`+ messgaes[0] +`</div>`);
                    if(_FOCUS_) {
                        _INPUT_.focus();
                    }
                    _FOCUS_ = false;
                // }
            });
            if (hidden_inputs_errors.length > 0) {
                BS_H.toastr(
                    'error',
                    '',
                    hidden_inputs_errors
                );
            }
            $(".kt-selectpicker").selectpicker('refresh');
        };
        var RESET_FORM_VALIDATION_ERRORS = function($Form) {
            $Form.find('.is-invalid').removeClass('is-invalid');
            $Form.find('.invalid-feedback').remove();
        };
    </script>
    @stack('scripts')

 
    
</body>
</html>
