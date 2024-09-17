<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="/" class="logo logo-dark">
                        <span class="logo-sm">
                            <img class="logo_basic" src="{{get_file(setting()->logo_header)}}" alt=""
                                 height="22">
                        </span>
                        <span class="logo-lg">
                            <img class="logo_basic" src="{{get_file(setting()->logo_header)}}" alt=""
                                 height="17">
                        </span>
                    </a>

                    <a href="/" class="logo logo-light">
                        <span class="logo-sm">
                            <img class="logo_basic" src="{{get_file(setting()->logo_header)}}" alt=""
                                 height="22">
                        </span>
                        <span class="logo-lg">
                            <img class="logo_basic" src="{{get_file(setting()->logo_header)}}" alt=""
                                 height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

            </div>
                            <!-- =================== -->
                             <!-- AE header  -->
                             <nav class="navbar navbar-expand-lg AE_FastLink">
                                <div class="container-fluid">

                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                                        <i class="fa-solid fa-bars" id="AE_header_button"></i>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                                <li class="nav-item">
                                                    <a class="nav-link  header-link-ya active" href="#" data-routeName="{{route('rows.index')}}" data-open="edara">
                                                        <!-- <i class="fa-solid fa-desktop"></i> -->
                                                        الادارة
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link header-link-ya " href="#" data-routeName="{{route('rows.index')}}" data-open="tahfez">
                                                    <!-- <i class="fa-solid fa-pen"></i> -->
                                                        التحفيز
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link header-link-ya " href="#" data-routeName="{{route('rows.index')}}" data-open="taqeem">
                                                    <!-- <i class="fa-solid fa-pen"></i> -->
                                                        تقييم المعلمين
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link header-link-ya " href="#" data-routeName="{{route('rows.index')}}" data-open="late">
                                                    <!-- <i class="fa-solid fa-pen"></i> -->
                                                        الغياب والتاخير
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link header-link-ya " href="#" data-routeName="{{route('rows.index')}}" data-open="notification-send">
                                                    <!-- <i class="fa-solid fa-pen"></i> -->
                                                        الرسائل والاشعارات
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link header-link-ya " href="#" data-routeName="{{route('rows.index')}}" data-open="academic">
                                                        <!-- <i class="fa-solid fa-pen"></i> -->
                                                        اكاديمي
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link header-link-ya " href="#" data-routeName="{{route('rows.index')}}" data-open="reports">
                                                    <!-- <i class="fa-solid fa-pen"></i> -->
                                                        التقارير
                                                    </a>
                                                </li>

                                            </ul>

                                    </div>
                                </div>
                            </nav>
                            <!-- AE header  -->
                <!-- ================= -->
            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                           aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>




                <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(app()->getLocale()=='ar')
                        <img src="{{url('assets')}}/dashboard/images/flags/us.svg" alt="Header Language" height="20"
                             class="rounded">
                        @else
                            <img src="{{url('assets')}}/dashboard/images/flags/flag.svg" alt="Header Language" height="20"
                                 class="rounded">
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                            @if($properties['native']=='English')
                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                    <!-- item-->
                                    <a class="dropdown-item notify-item language py-2" hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <img src="{{url('assets')}}/dashboard/images/flags/us.svg" alt="user-image"
                                             class="me-2 rounded" height="18">
                                        <span class="align-middle"> {{trans('frontend.eng')}} </span>
                                    </a>

                                @endif

                            @elseif($properties['native']=='العربية')
                                @if(LaravelLocalization::getCurrentLocale()=="en")

                                    <!-- item-->
                                    <a class="dropdown-item notify-item language py-2" hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                        <img src="{{url('assets')}}/dashboard/images/flags/flag.svg" alt="user-image"
                                             class="me-2 rounded" height="18">
                                        <span class="align-middle"> {{trans('frontend.arb')}} </span>
                                    </a>

                                @endif

                            @endif

                        @endforeach
                        <!-- item-->


                    </div>
                </div>

                <div class="dropdown topbar-head-dropdown ms-1 header-item">

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                            <i class='bx bx-fullscreen fs-22'></i>
                        </button>
                    </div>

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                            <i class='bx bx-moon fs-22'></i>
                        </button>
                    </div>

                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                 src="{{get_user_file(auth()->guard('admin')->user()->image)}}"
                                 alt="">
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{auth()->guard('admin')->user()->name}}</span>
                                <span
                                    class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{auth()->guard('admin')->user()->business_name}}</span>
                            </span>
                        </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">{{trans('admin.Welcome')}} {{auth()->guard('admin')->user()->name}}!</h6>
                            <a class="dropdown-item editProfile" href=""><i
                                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle "> {{trans('admin.Arithmetic')}} </span></a>

{{--                            <a class="dropdown-item" href="{{route('settings.index')}}">--}}
{{--                                <i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i>--}}
{{--                                <span class="align-middle">{{trans('admin.Settings')}}</span></a>--}}
                            {{--                        <a class="dropdown-item" href="auth-lockscreen-basic.html"><i--}}
                            {{--                                class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span--}}
                            {{--                                class="align-middle">Lock screen</span></a>--}}
                            <a class="dropdown-item" href="{{route('admin.logout')}}"><i
                                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle" data-key="t-logout">{{trans('admin.sign out')}}</span></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</header>

