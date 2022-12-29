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
                                <h5>Detail My Profile</h5>
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
                                                            <img src="{{ asset('template/profile default/profileDefault.png') }}" alt
                                                            class="w-px-40 h-px-40 rounded-circle img-fluid" />
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
                            <!-- Basic Layout & Basic with Icons -->

                            <!-- Basic Layout -->
                            <div class="col">
                              <div class="card mb-4">
                    <h5 class="card-header py-0 mt-3">Profile Details</h5>
                    <!-- Account -->
                    <form action="/profileUpdate/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                     <input type="hidden" name="oldImage" value="{{ Auth::user()->image }}">
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        @if(Auth::user()->image)
                          <img
                            src="{{ asset('storage/' . Auth::user()->image) }}"
                            alt="user-avatar"
                            class="img-preview d-block rounded img-fluid w-px-100 h-px-100"
                            id="uploadedAvatar"/>
                          @else
                          <img
                            src="template/profile default/profileDefault.png"
                            alt="user-avatar"
                            class="img-preview d-block rounded"
                            height="100"
                            width="100"
                            id="uploadedAvatar"
                          />
                        @endif
                        <div class="button-wrapper">
                          <label for="image" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="image"
                              onchange="previewImage()"
                              name="image"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <button type="reset" class="btn btn-outline-secondary account-image-reset mb-4" onclick="location.reload()">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                      
                          @error('image')
                          <p class="text text-danger mb-0">{{$message}}</p>
                          @enderror
                        
                          <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Max size of 1024K</p>
                         
                        </div>
                      </div>
                    </div>
               
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Full Name</label>
                            <input
                              class="form-control @error('name') is-invalid @enderror"
                              type="text"
                              id="name"
                              name="name"
                              value="{{ Auth::user()->name }}"
                              autofocus
                            />
                            @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="admin.doe@example.com" value="{{ Auth::user()->email }}" />
                            @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="role" class="form-label">Role</label>
                            <input
                              class="form-control"
                              type="text"
                              id="role"
                              value="{{ Auth::user()->role->name }}"
                              readonly
                            />
                          </div>
                          @if(Auth::user()->created_at)
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Created AT</label>
                            <input
                              type="text"
                              class="form-control"
                              id="organization"
                              value="{{ Auth::user()->created_at->format('D,  d/m/Y') }}"
                              readonly/>
                          </div>
                          @endif
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <form action="/changePassword/{{ Auth::user()->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card mb-4">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                       @if (Session::has('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                       @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congrats!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                      <div class="mb-3 col-12 mb-0">
                       <div class="mb-3">
                          <label for="oldPassword" class="form-label">Old Password</label>
                          <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" id="oldPassword" placeholder="Enter old password" name="oldPassword">
                          @error('oldPassword')
                          <div class="text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="row">
                          <div class="col">
                              <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" placeholder="Enter new password">
                                 @error('newPassword')
                          <div class="text text-danger">{{ $message }}</div>
                          @enderror
                              </div>
                          </div>
                          <div class="col">
                            <div class="mb-3">
                          <label for="newPassword2" class="form-label">Confirm New Password</label>
                          <input type="password" class="form-control @error('newPassword2') is-invalid @enderror" id="newPassword2" name="newPassword2" placeholder="Enter confirm new password">
                            @error('newPassword2')
                          <div class="text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                          </div>
                        </div>  
                     <button type="submut" class="btn btn-primary me-2">Save changes</button>
                     <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                      </div>
                  </form>
                    </div>
                  </div>
                  <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form action="/destroyAccount/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="confirmation"
                            value="{{ Auth::user()->id }}"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                          @error('confirmation')
                          <div class="text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
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
