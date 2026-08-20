<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title }} | ميدي تريب</title>
        <link href="{{ asset('build/dashboard-assets/css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('build/dashboard-assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('build/dashboard-assets/css/custom.css') }}">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark">
            <!-- Navbar Brand -->
            <a class="navbar-brand ps-3 mx-5" href="{{ route('home') }}">
                <img src="{{ asset('build/assets/images/logo.svg') }}" alt="ميدي تريب">
                <span>
                    ميدي تريب
                    <small>لوحة التحكم</small>
                </span>
            </a>
            <!-- Sidebar Toggle -->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" id="navbarSearch" type="text" placeholder="ابحث عن..." aria-label="ابحث عن..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button">بحث</button>
                </div>
            </form>
            <!-- Navbar -->
            <ul class="navbar-nav me-auto me-md-0 ms-3 ms-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                        <span class="d-none d-lg-inline ms-1">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user me-2 text-success"></i> الملف الشخصي</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}" target="_blank"><i class="fas fa-globe me-2 text-primary"></i> زيارة الموقع</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item w-100 text-danger"><i class="fas fa-sign-out-alt me-2"></i> تسجيل الخروج</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">الرئيسية</div>
                            <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                لوحة التحكم
                            </a>

                            <div class="sb-sidenav-menu-heading">الواجهة</div>

                            <a class="nav-link collapsed {{ request()->routeIs('dashboard.hospitals.*') ? '' : '' }}" href="{{ route('dashboard.hospitals.index') }}" data-bs-toggle="collapse" data-bs-target="#hospitals" aria-expanded="{{ request()->routeIs('dashboard.hospitals.*') ? 'true' : 'false' }}" aria-controls="hospitals">
                                <div class="sb-nav-link-icon"><i class="fas fa-hospital"></i></div>
                                المستشفيات
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->routeIs('dashboard.hospitals.*') ? 'show' : '' }}" id="hospitals" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->routeIs('dashboard.hospitals.index') ? 'active' : '' }}" href="{{ route('dashboard.hospitals.index') }}">قائمة المستشفيات</a>
                                    <a class="nav-link {{ request()->routeIs('dashboard.hospitals.create') ? 'active' : '' }}" href="{{ route('dashboard.hospitals.create') }}">إضافة مستشفى</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ request()->routeIs('dashboard.specializations.*') ? '' : '' }}" href="{{ route('dashboard.specializations.index') }}" data-bs-toggle="collapse" data-bs-target="#specializations" aria-expanded="{{ request()->routeIs('dashboard.specializations.*') ? 'true' : 'false' }}" aria-controls="specializations">
                                <div class="sb-nav-link-icon"><i class="fas fa-stethoscope"></i></div>
                                التخصصات
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->routeIs('dashboard.specializations.*') ? 'show' : '' }}" id="specializations" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->routeIs('dashboard.specializations.index') ? 'active' : '' }}" href="{{ route('dashboard.specializations.index') }}">قائمة التخصصات</a>
                                    <a class="nav-link {{ request()->routeIs('dashboard.specializations.create') ? 'active' : '' }}" href="{{ route('dashboard.specializations.create') }}">إضافة تخصص</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ request()->routeIs('dashboard.specialists.*') ? '' : '' }}" href="{{ route('dashboard.specialists.index') }}" data-bs-toggle="collapse" data-bs-target="#specialists" aria-expanded="{{ request()->routeIs('dashboard.specialists.*') ? 'true' : 'false' }}" aria-controls="specialists">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                                الأخصائيون
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->routeIs('dashboard.specialists.*') ? 'show' : '' }}" id="specialists" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->routeIs('dashboard.specialists.index') ? 'active' : '' }}" href="{{ route('dashboard.specialists.index') }}">قائمة الأخصائيين</a>
                                    <a class="nav-link {{ request()->routeIs('dashboard.specialists.create') ? 'active' : '' }}" href="{{ route('dashboard.specialists.create') }}">إضافة أخصائي</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ request()->routeIs('dashboard.offers.*') ? '' : '' }}" href="{{ route('dashboard.offers.index') }}" data-bs-toggle="collapse" data-bs-target="#offers" aria-expanded="{{ request()->routeIs('dashboard.offers.*') ? 'true' : 'false' }}" aria-controls="offers">
                                <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                                العروض
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->routeIs('dashboard.offers.*') ? 'show' : '' }}" id="offers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->routeIs('dashboard.offers.index') ? 'active' : '' }}" href="{{ route('dashboard.offers.index') }}">قائمة العروض</a>
                                    <a class="nav-link {{ request()->routeIs('dashboard.offers.create') ? 'active' : '' }}" href="{{ route('dashboard.offers.create') }}">إضافة عرض</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ request()->routeIs('dashboard.orders.*') ? '' : '' }}" href="{{ route('dashboard.orders.index') }}" data-bs-toggle="collapse" data-bs-target="#orders" aria-expanded="{{ request()->routeIs('dashboard.orders.*') ? 'true' : 'false' }}" aria-controls="orders">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                الطلبات
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->routeIs('dashboard.orders.*') ? 'show' : '' }}" id="orders" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->routeIs('dashboard.orders.index') ? 'active' : '' }}" href="{{ route('dashboard.orders.index') }}">قائمة الطلبات</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ request()->routeIs('dashboard.articles.*') ? '' : '' }}" href="{{ route('dashboard.articles.index') }}" data-bs-toggle="collapse" data-bs-target="#articles" aria-expanded="{{ request()->routeIs('dashboard.articles.*') ? 'true' : 'false' }}" aria-controls="articles">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                المقالات
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->routeIs('dashboard.articles.*') ? 'show' : '' }}" id="articles" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->routeIs('dashboard.articles.index') ? 'active' : '' }}" href="{{ route('dashboard.articles.index') }}">قائمة المقالات</a>
                                    <a class="nav-link {{ request()->routeIs('dashboard.articles.create') ? 'active' : '' }}" href="{{ route('dashboard.articles.create') }}">إضافة مقال</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ request()->routeIs('dashboard.users.*') ? '' : '' }}" href="{{ route('dashboard.users.index') }}" data-bs-toggle="collapse" data-bs-target="#users" aria-expanded="{{ request()->routeIs('dashboard.users.*') ? 'true' : 'false' }}" aria-controls="users">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                المستخدمون
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->routeIs('dashboard.users.*') ? 'show' : '' }}" id="users" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->routeIs('dashboard.users.index') ? 'active' : '' }}" href="{{ route('dashboard.users.index') }}">قائمة المستخدمين</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ request()->routeIs('dashboard.messages.*') ? '' : '' }}" href="{{ route('dashboard.messages.index') }}" data-bs-toggle="collapse" data-bs-target="#messages" aria-expanded="{{ request()->routeIs('dashboard.messages.*') ? 'true' : 'false' }}" aria-controls="messages">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                                رسائل التواصل
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->routeIs('dashboard.messages.*') ? 'show' : '' }}" id="messages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->routeIs('dashboard.messages.index') ? 'active' : '' }}" href="{{ route('dashboard.messages.index') }}">قائمة الرسائل</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ request()->routeIs('dashboard.rates.*') ? '' : '' }}" href="{{ route('dashboard.rates.index') }}" data-bs-toggle="collapse" data-bs-target="#rates" aria-expanded="{{ request()->routeIs('dashboard.rates.*') ? 'true' : 'false' }}" aria-controls="rates">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                التقييمات
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->routeIs('dashboard.rates.*') ? 'show' : '' }}" id="rates" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->routeIs('dashboard.rates.index') ? 'active' : '' }}" href="{{ route('dashboard.rates.index') }}">قائمة التقييمات</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">روابط</div>
                            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                                <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                                الموقع الرئيسي
                            </a>
                            <a class="nav-link" href="{{ route('profile') }}" target="_blank">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                الملف الشخصي
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">مسجل الدخول باسم:</div>
                        <div class="sb-sidenav-footer-user">
                            <i class="fas fa-user-circle fa-lg"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

                <main>
                    {{ $slot }}
                </main>

                {{-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid ">
                        <div class="d-flex align-items-center justify-content-between ">
                            <div class="text-muted">حقوق النشر &copy; موقعك 2023</div>
                            <div>
                                <a href="#">سياسة الخصوصية</a>
                                &middot;
                                <a href="#">الشروط والأحكام</a>
                            </div>
                        </div>
                    </div>
                </footer> --}}
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('build/dashboard-assets/js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        @stack('scripts')
    </body>
</html>
