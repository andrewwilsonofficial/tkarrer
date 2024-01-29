<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img class="h-100" src="{{ asset('assets/images/logo-black.svg') }}" alt="{{ config('app.name') }}">
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="الرئيسية">
                    الرئيسية
                </div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('categories') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-search"></i>
                <div data-i18n="الفئات">
                    الفئات
                </div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin-reports') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div data-i18n="التقارير">
                    التقارير
                </div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin-proofs') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-info-circle"></i>
                <div data-i18n="الأدلة">
                    الأدلة
                </div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
