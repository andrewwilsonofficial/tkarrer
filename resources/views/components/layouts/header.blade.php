<header>
    <div class="header-logo">
        <img src="{{ asset('assets/images/logo-black.svg') }}" alt="{{ config('app.name') }}">
    </div>

    <!-- Use Bootstrap responsive navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        الرئيسية
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#reports-section">
                        التقارير والدراسات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#proff-section">
                        الادلة المعرفية
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('about-us') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('about-us') }}">
                        من نحن؟
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="header-placeholder"></div>
