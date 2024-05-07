<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AuthApp</title>
        <style>
             body {
            font-family: 'sans-serif';
            -webkit-font-smoothing: antialiased;
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
            min-height: 100vh;
            background: linear-gradient(135deg, #ff5e78, #3490dc);
            color: rgba(255, 255, 255, 0.5);
        }

        .content {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .nav {
            justify-content: center;
            display: flex;
            padding: 12px;
            background-color: #A3D8FF;
        }
        a{
            font-family: sans-serif;
        }

        .nav-link {
            text-decoration: none;
            color: #000;
            padding: 8px 12px;
            border-radius: 10px;
        }
            
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-#BACD92">
        <div class="content">
            @if (Route::has('login'))
                            <nav class="nav justify-content-end mx-auto p-2  bg-body-tertiary">
                                @auth
                                    <a
                                    class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                    class="nav-link" href="{{ route('login') }}"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                        class="nav-link" href="{{ route('register') }}"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
    </body>
</html>