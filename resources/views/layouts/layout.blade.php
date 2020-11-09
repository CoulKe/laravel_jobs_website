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
    <nav>
        <a href="/" id="site-title">Jobs Search</a>
        <img src="./images/hamburger.png" alt="menu" id="menu">
        <div id="compressed-nav">
            <a href="#" id="cancelMenu">&times;</a>
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/jobs">Jobs</a>
                </li>
                <li>
                    <a href="/employers">Employers</a>
                </li>
                <li>
                    <a href="/candidates">Candidates</a>
                </li>
            </ul>

            <ul>
                <!-- Authentication Links -->
                @guest
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @endguest
                @auth
                <li>
                    <a href="#" role="button">Profile</a>

                    <div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
        </div><!--compressed nav-->
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
    {{-- Javascript --}}
    <script src="./js/menu.js"></script>
</body>

</html>