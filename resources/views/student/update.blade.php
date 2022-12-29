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
                                <h5>Form Update Data Student</h5>
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

                        </div>


                        <!-- Basic Layout & Basic with Icons -->


                        <!-- Basic Layout -->
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <form action="/studentUpdate/{{ $student->slug }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="oldImage" value="{{ $student->image }}">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text"
                                                        class="form-control  @error('name') is-invalid @enderror"
                                                        id="name" name="name" value="{{ $student->name }}">
                                                    @error('name')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="nim" class="form-label">NIM</label>
                                                    <input type="text"
                                                        class="form-control @error('nim') is-invalid @enderror"id="nim"
                                                        name="nim" value="{{ $student->nim }}" onkeypress="return /[0-9]/i.test(event.key)">
                                                    @error('nim')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="class_id" class="form-label">Class ID</label>
                                                    <div class="input-group">
                                                        <label class="input-group-text " for="class_id">Options</label>
                                                        <select class="form-select" id="class_id" name="class_id">
                                                            <option value="{{ $student->class->id }}" selected>
                                                                {{ $student->class->name }}</option>
                                                            @foreach ($class as $class_id)
                                                                <option value="{{ $class_id->id }}">
                                                                    {{ $class_id->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <div class="input-group">
                                                        <label class="input-group-text " for="gender">Options</label>
                                                        <select class="form-select" id="gender" name="gender">
                                                            <option selected>{{ $student->gender }}</option>
                                                            @if ($student->gender == 'Pria')
                                                                <option value="Wanita" selected>
                                                                    Wanita
                                                                </option>
                                                            @else
                                                                <option value="Pria">
                                                                    Pria
                                                                </option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="image" class="form-label">Image</label>
                                                @if ($student->image)
                                                    <img src="{{ asset('storage/' . $student->image) }}" alt=""
                                                        class="img-preview img-fluid mb-2 col-sm-2 d-block">
                                                @else
                                                    <img class="img-preview img-fluid mb-2 col-sm-2">
                                                @endif
                                                <div class="input-group">
                                                    <input type="file"
                                                        class="form-control @error('image') is-invalid @enderror"
                                                        id="image" aria-describedby="inputGroupFileAddon04"
                                                        aria-label="Upload" name="image" onchange="previewImage()">
                                                </div>
                                                @error('image')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                                
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="extracurricular"
                                                        class="form-label">Extracurricular</label>
                                                    @foreach ($eskul as $eskuls)
                                                        <div class="form-check">
                                                            {{-- todo name disini pakein array kosong buat nampung --}}
                                                            <input class="form-check-input" type="checkbox"
                                                                value="{{ $eskuls->id }}" name="extracurricular[]"
                                                                id="flexCheckDefault" {{-- extracurriculars di ambil dari model student yang method relasi --}}
                                                                @foreach ($student->extracurriculars as $value)
                                                                @if ($eskuls->id == $value->id)
                                                                checked @endif @endforeach>
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                {{ $eskuls->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 me-3">Save changes</button>
                                           <a href="/students" class="btn btn-outline-secondary mt-3">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer
                    class="content-footer
                                                                footer bg-footer-theme">
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
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFRaeder = new FileReader();
            oFRaeder.readAsDataURL(image.files[0]);

            oFRaeder.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
