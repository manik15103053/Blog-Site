<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="{{ route('tags') }}"">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    {{ __('Tag') }}
                </a>
                <a class="nav-link collapsed" href="{{ route('categories') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    {{ __('Category') }}
                </a>
                <a class="nav-link collapsed" href="{{ route('posts') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    {{ __('Post') }}
                </a>
        </div>
    </nav>
</div>
