<header>
    <div class="header-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo-black.svg') }}" alt="{{ config('app.name') }}">
        </a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light pr-0">
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav pr-0">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link mx-3" href="{{ route('home') }}">
                        الرئيسية
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3" href="{{ route('home') }}#reports-section">
                        التقارير والدراسات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3" href="{{ route('home') }}#proff-section">
                        الادلة المعرفية
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('about-us') ? 'active' : '' }}">
                    <a class="nav-link mx-3" href="{{ route('about-us') }}">
                        من نحن؟
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="header-placeholder"></div>

<div class="_4jKGSa">
    <div class="SWiJzX -cUJrF">
        <div class="SWiJzX MQH7Px"><span class="_2JTEU2 nkQSL5"></span><span class="_2JTEU2 rK-SRb"></span></div>
    </div>
</div>
