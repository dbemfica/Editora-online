<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <?php
        $navbar = Navbar::withBrand(config('app.name', 'Laravel'),url('/'))->inverse();
        if(Auth::check()){
            $navbar->withContent(Navigation::links([
                [
                    'link' => url('/categories'),
                    'title' => 'Categorias'
                ],
                [
                    'link' => url('/books'),
                    'title' => 'Livros'
                ]
            ]));
            $navbar->withContent(Navigation::links([
                [
                    Auth::user()->name,
                    [
                        [
                            'link' => '#',
                            'title' => 'Logout',
                            'linkAttributes' => [
                                "onclick" => "event.preventDefault();document.getElementById(\"logout-form\").submit()"
                            ]
                        ]
                    ]
                ]
            ])->right());
        }else{
            $navbar->withContent(Navigation::links([
                [
                    'link' => url('/login'),
                    'title' => 'Login'
                ],
                [
                    'link' => url('/register'),
                    'title' => 'Register'
                ]
            ])->right());
        }

        ?>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

        {!! $navbar !!}

        @if(Session::has('message'))
            <div class="container">
                {!! Alert::success(Session::get('message'))->close() !!}
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
