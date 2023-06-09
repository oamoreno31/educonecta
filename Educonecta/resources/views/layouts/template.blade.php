<!-- Navbar -->
<nav
    class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid px-0">
        <a class="navbar-brand font-weight-bolder ms-sm-3"
            href="https://demos.creative-tim.com/soft-ui-design-system/index.html" rel="tooltip"
            title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
            @yield('page_title')
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-lg-12 ps-lg-5 w-100">
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        href="javascript:;" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                        <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-1">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages">
                        <div class="d-none d-lg-block">
                            <div
                                class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                                Landing Pages
                            </div>
                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                <span class="ps-3">About Us</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span class="ps-3">Contact Us</span>
                            </a>
                            <a href="./pages/author.html" class="dropdown-item border-radius-md">
                                <span class="ps-3">Author</span>
                            </a>
                            <div
                                class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-3">
                                Account
                            </div>
                            <a href="./pages/sign-in.html" class="dropdown-item border-radius-md">
                                <span class="ps-3">Sign In</span>
                            </a>
                        </div>

                        <div class="d-lg-none">
                            <div
                                class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                                Landing Pages
                            </div>

                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                <span class="ps-3">About Us</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span class="ps-3">Contact Us</span>
                            </a>
                            <a href="./pages/author.html" class="dropdown-item border-radius-md">
                                <span class="ps-3">Author</span>
                            </a>

                            <div
                                class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-3">
                                Account
                            </div>
                            <a href="./pages/sign-in.html" class="dropdown-item border-radius-md">
                                <span class="ps-3">Sign In</span>
                            </a>

                        </div>

                    </div>
                </li>

                <li class="nav-item dropdown dropdown-hover mx-2"></li>
                <li class="nav-item dropdown dropdown-hover mx-2"></li>
                <li class="nav-item ms-lg-auto"></li>
                @guest
                @if (Route::has('login'))
                <li class="nav-item my-auto ms-3 ms-lg-0">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item my-auto ms-3 ms-lg-0">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item my-auto ms-3 ms-lg-0 dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>