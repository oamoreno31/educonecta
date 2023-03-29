<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
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
                                    href="javascript:;" id="dropdownMenuPages" data-bs-toggle="dropdown"
                                    aria-expanded="false">
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
                            <li class="nav-item my-auto ms-3 ms-lg-0"><a href="" class="btn btn-sm btn-outline-primary btn-round mb-0 me-1 mt-2 mt-md-0">Online Builder</a></li>
                            <li class="nav-item my-auto ms-3 ms-lg-0"><a href="" class="btn btn-sm bg-gradient-primary btn-round mb-0 me-1 mt-2 mt-md-0">Upgrade to Pro</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>