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
                                <h5>Form Student</h5>
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
                       
                        <form action="" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Keyword for search..."
                                            aria-label="Search..." aria-describedby="button-addon2" name="keyword">
                                        <button class="btn btn-primary rounded" type="submit"
                                            id="button-addon2">Search</button>
                                    </div>
                                </div>
                        </form>
                  
                        <!-- Basic Layout & Basic with Icons -->
                        {{-- * Alert --}}
                      {{-- !! start ngasal --}}
                       @if (Auth::user()->role_id == 3)
                            @else
                                <div class="d-flex bd-highlight mb-3">
                                    <div class="p-2 bd-highlight">
                                        <a href="exportPDF" class="btn btn-danger p-2 ">Export PDF
                                            <i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle p-2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Excel <i class="fas fa-file-excel"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="exportExcel"><i
                                                            class="fas fa-cloud-download-alt"></i> Export to Excel</a></li>
                                                <li>
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        class="dropdown-item">
                                                        <i class="fas fa-cloud-upload-alt"></i> Import to Excel
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_id === 1)
                                    <div class="p-2 bd-highlight">
                                        <a href="studentMailAll/" class="btn btn-info p-2 ">Mail
                                         <i class="fas fa-mail-bulk"></i></a>
                                    </div>
                                    @endif
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Import File Excel
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="importExcel" method="POST"
                                                        enctype="multipart/form-data" class="ms-auto">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-9">
                                                                <input type="file" name="file"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col">
                                                                <button class="btn btn-success d-inline"><i
                                                                        class="fas fa-upload"></i>
                                                                    Import</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="ms-auto p-2 bd-highlight">
                                        <a href="/studentCreate"class="btn btn-primary p-2">
                                            Add Student <i class="fas fa-user-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                     
{{-- !! end ngasal dulu ya --}}
                            @if (Session::has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Congrats!</strong> {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (Session::has('warning'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Warning!</strong> {{ session('warning') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <strong>Warning! </strong> {{ $error }} <br>
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Basic Layout -->
                            <div class="col">
                                <div class="card">

                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    {{-- <th>NIM</th> --}}
                                                    <th>Gender</th>
                                                    <th>Class</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    @if (Auth::user()->role_id != 3)
                                                        <th>Actions</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php $i = $listStudent->firstItem(); ?>
                                                @forelse ($listStudent as $mhs)
                                                    <tr>
                                                        <td><strong>{{ $i++ }}</strong></td>
                                                        <td>{{ $mhs->name }}</td>
                                                        {{-- <td> {{ $mhs->nim }}</td> --}}
                                                        <td> {{ $mhs->gender }}</td>
                                                        <td>{{ $mhs->class->name }}</td>
                                                        <td>{{ $mhs->created_at->format('D-d-m-Y') }}</td>
                                                        <td>{{ $mhs->updated_at->diffForHumans() }}</td>
                                                        @if (Auth::user()->role_id != 3)
                                                            <td>
                                                                {{-- Prety URL --}}
                                                                <a href="/student/{{ $mhs->slug }}"
                                                                    style="color: green"><i
                                                                        class="fas fa-info-circle"></i></a>
                                                                {{-- <a href="/student/{{ $mhs->id }}"
                                                                    style="color: green"><i
                                                                        class="fas fa-info-circle"></i></a> --}}
                                                                @if (Auth::user()->role_id == 1)
                                                                    <form action="/studentDestroy/{{ $mhs->slug }}"
                                                                        method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" style="color: red"
                                                                            class="border-0"><i class="fas fa-trash"
                                                                                onclick="myFunction()"
                                                                                id="btnn-a"></i></button>
                                                                    </form>
                                                                @else
                                                                @endif
                                                                {{-- <a href="#" style="color: red"><i
                                                                    class="fas fa-trash"></i></a> --}}
                                                                <a href="/studentEdit/{{ $mhs->slug }}"
                                                                    style="color: blue"><i
                                                                        class="fas fa-user-edit"></i></a>
                                                                <a href="/studentMail/{{ $mhs->slug }}"
                                                                    style="color: rgb(255, 174, 0)"><i class="fas fa-solid fa-paper-plane"></i></a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" align="center">Data student not found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col mt-3">
                                    {{ $listStudent->withQueryString()->links() }}
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
