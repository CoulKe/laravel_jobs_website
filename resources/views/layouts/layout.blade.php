<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/normalize.css">
    <!-- Styles -->
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="/css/app.css">
    {{-- Custom css --}}
    <link rel="stylesheet" href="/css/main.css">
    
    <title>Jobs website | @yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="/">Jobs Search</a>
        <ul class="nav collapse navbar-collapse justify-content-center">
            <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="/jobs" class="nav-link">Jobs</a>
            </li>
            <li class="nav-item">
                <a href="/employers" class="nav-link">Employers</a>
            </li>
            <li class="nav-item">
                <a href="/candidates" class="nav-link">Candidates</a>
            </li>
        </ul>
        
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
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>

        <div id="quick_links">
            <div class="container">
                <div class="links_wrapper">
                    <div id="company_links">
                        <a href="" class="quick_link">About us</a>
                        <a href="" class="quick_link">Terms and conditions</a>
                        <a href="" class="quick_link">Privacy policy</a>
                        <a href="" class="quick_link">Support</a>
                    </div>
                    <div id="users_links">
                        <a href="" class="quick_link">Upload resume</a>
                        <a href="jobs" class="quick_link">Browse jobs</a>
                        <a href="employers" class="quick_link">Employers</a>
                        <a href="candidates" class="quick_link">Candidates</a>
                    </div>

                    <div id="other_links">
                        <a href="" class="quick_link">Pricing</a>
                        <a href="" class="quick_link">Contacts</a>
                        @auth
                            @if (Auth::user()->position === 'employer')
                            <a href="/profile#post_job" class="quick_link">Post job</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <div id="newsletter">
                    <h1>Subscribe to our newsletter</h1>
                    <form action="" method="post">
                        <label for="email">Email:</label> <br>
                        <input type="email" placeholder="Enter your email" name="email"> <br>
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
        <div id="copyright">
            <p>Developed by Luteya Coulston</p>
            <p>2020 &copy</p>
        </div>
    </footer>
</body>

</html>