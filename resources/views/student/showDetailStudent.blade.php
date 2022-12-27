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
                                <h5>Detail Data Student</h5>
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
                                        <img src="{{ asset('template/assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('template/assets/img/avatars/1.png') }}" alt
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
                    <div class="container-xxl flex-grow-1 container-p-y ">
                        <div class="row">
                            <div class="col-sm mb-3">
                                <div class="card" style="width: 18rem;">
                                    @if ($student->image)
                                        <img src="{{ asset('storage/' . $student->image) }}" class="card-img-top"
                                            alt="..." style="height: 15rem;">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&fm=jpg&fit=crop&w=1080&q=80&fit=max"
                                            class="card-img-top" alt="..." style="height: 16rem;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $student->name }}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic Layout & Basic with Icons -->


                            <!-- Basic Layout -->
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="text-nowrap">
                                                        <th>Name</th>
                                                        <th>NIM</th>
                                                        <th>Gender</th>
                                                        <th>Class</th>
                                                        <th>Homeroom Teacher</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->nim }}</td>
                                                        <td>{{ $student['gender'] }}</td>
                                                        <td>{{ $student->class->name }}</td>
                                                        <td>{{ $student->class->homeroomTeacher->name }}</td>
                                                        {{-- kalau pake hasMany harus di looping dulu --}}
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col mt-3">
                                                <h5>Extracurricular</h3>
                                                    {{-- {{ $student->extracurriculars }} --}}
                                                    <ol>
                                                        @forelse ($student->extracurriculars as $eskul)
                                                            <li>{{ $eskul->name }}</li>
                                                        @empty
                                                            <p>Extracurricular not found!</p>
                                                        @endforelse
                                                    </ol>
                                            </div>
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
