@extends('layouts.main')
@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

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
                                <h5>Detail Data Teachers</h5>
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
                                       @if(Auth::user()->image)
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt
                                                class="w-px-40 h-px-40 rounded-circle img-fluid" />
                                        @else
                                      <img src="{{ asset('template/profile default/profileDefault.png') }}" alt  class="w-px-40 h-px-40 rounded-circle img-fluid" />
                                        @endif
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                   <div class="avatar avatar-online">
                                       @if(Auth::user()->image)
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt
                                                class="w-px-40 h-px-40 rounded-circle img-fluid" />
                                        @else
                                      <img src="{{ asset('template/profile default/profileDefault.png') }}" alt  class="w-px-40 h-px-40 rounded-circle img-fluid" />
                                        @endif
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
                                        <a class="dropdown-item" href="/profile">
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
                    <div class="container-xxl flex-grow-1 container-p-y ">
                        <div class="row">
                            <!-- Basic Layout & Basic with Icons -->

                            <!-- Basic Layout -->
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Class ID</th>
                                                        <th>Student</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $teacher->name }}</td>
                                                        <td>
                                                            @if ($teacher->class)
                                                                {{ $teacher->class->name }}
                                                        </td>
                                                    @else
                                                        Class not Found
                                                        @endif
                                                        <td>
                                                            @if ($teacher->class)
                                                                @foreach ($teacher->class->student as $teachers)
                                                                    - {{ $teachers->name }} <br>
                                                                @endforeach
                                                            @else
                                                                Student not Found
                                                            @endif
                                                            {{-- @foreach ($teacher->student as $students)
                                                                {{ $students->name }}
                                                            @endforeach --}}
                                                        </td>
                                                        {{-- kalau pake hasMany harus di looping dulu --}}
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="/teacher" class="btn btn-outline-secondary mt-3 float-end">Back</a>
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
