<!-- Navbar -->
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-fluid">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!--/ Style Switcher -->
                <!-- Style Switcher -->
                <li class="nav-item me-2 me-xl-0">
                    <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                        <i class="bx bx-sm"></i>
                    </a>
                </li>
                <!--/ Style Switcher -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar">
                            {{-- Check if avatar is url or file --}}
                            @if (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL))
                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                    class="rounded-circle" referrerpolicy="no-referrer" />
                            @else
                                <img src="{{ asset('dashboard-assets/img/avatars/' . Auth::user()->avatar) }}"
                                    alt="{{ Auth::user()->name }}" class="rounded-circle"
                                    referrerpolicy="no-referrer" />
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('home') }}">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            @if (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL))
                                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                                    class="rounded-circle" referrerpolicy="no-referrer" />
                                            @else
                                                <img src="{{ asset('dashboard-assets/img/avatars/' . Auth::user()->avatar) }}"
                                                    alt="{{ Auth::user()->name }}" class="rounded-circle"
                                                    referrerpolicy="no-referrer" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block lh-1">
                                            {{ Auth::user()->name }}
                                        </span>
                                        <small>
                                            {{ Auth::user()->email }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('settings') }}">
                                <i class="bx bx-cog me-2"></i>
                                <span class="align-middle">
                                    الإعدادات
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">
                                    تسجيل الخروج
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </div>
</nav>

<!-- / Navbar -->
