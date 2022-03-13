<header>
    <div class="container-fluid position-relative no-side-padding">

        <a href="#" class="logo">{{ __('Blog Site') }}</a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">{{ __('Posts') }}</a></li>
            @guest
            <li><a href="{{ route('user.registration.form') }}">Registration</a></li>
            @else
            @if (Auth::guard('web')->check())
            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
            @endif
            @if (Auth::guard('admin')->check())
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            @endif

            @endguest
        </ul><!-- main-menu -->

        <div class="src-area">
            <form>
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" type="text" placeholder="Type of search">
            </form>
        </div>

    </div><!-- conatiner -->
</header>
