@extends('layouts.main')
@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('sweetalert::alert')
            {{-- sidebar --}}
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center mt-3">
                                {{-- <i class="bx bx-search fs-4 lh-0"></i> --}}
                                {{-- <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Searchtemplate."
                    aria-label="Searchtemplate."
                  /> --}}

                                <h5>Form Dashboard</h5>
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <li class="nav-item lh-1 me-3">
                                <a href="#" data-size="large" data-show-count="true">{{ Auth::user()->name }}</a>
                            </li>

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="template/assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="template/assets/img/avatars/1.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">{{ Auth::user()->role->name }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!--/ User -->
                        </ul>
                    </div>
                </nav>


                <!-- / Navbar -->

                <!-- Content wrapper -->

                <div class="content-wrapper">


                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Forms/</span> Dashboard
                        </h4>

                        @if (Session::has('message'))
                            <div class="col mb-3">
                                <div class="bs-toast toast fade show bg-primary" role="alert" aria-live="assertive"
                                    aria-atomic="true">
                                    <div class="toast-header">
                                        <i class="bx bx-bell me-2"></i>
                                        <div class="me-auto fw-semibold">Login Success!</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                        Wellcome back <b>{{ Auth::user()->name }}</b>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- @if (Session::has('message'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>Cangrats!</strong> {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif --}}
                        <!-- Basic Layout & Basic with Icons -->

                        <div class="row">
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="row">
                                    <div class="col-lg-2 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="template/assets/img/icons/unicons/chart-success.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Student</span>
                                                <h3 class="card-title mb-2">{{ count($student) }}</h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="template/assets/img/icons/unicons/chart-success.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Teacher</span>
                                                <h3 class="card-title mb-2">{{ count($teacher) }}</h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="template/assets/img/icons/unicons/chart-success.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Extracuricular</span>
                                                <h3 class="card-title mb-2">{{ count($eskul) }}</h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="template/assets/img/icons/unicons/chart-success.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Class</span>
                                                <h3 class="card-title mb-2">{{ count($class) }}</h3>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©Copyright
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                            </div>

                        </div>
                    </footer>

                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
@endsection
