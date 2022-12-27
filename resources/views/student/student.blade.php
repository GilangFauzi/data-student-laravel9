@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="coll">
                <div class="jumbotron">
                    <h1 class="display-4">Hello, {{ $name }}!</h1>
                    <p class="lead">Ini merupakan list data mahasiswa</p>
                    <hr class="my-4">
                    {{-- <div class="row mb-3"> --}}
                    {{-- <div class="col">
                            <span class="badge bg-light text-dark">Data Student : {{ count($count) }}</span>
                        </div> --}}
                    {{-- </div> --}}
                    @if (Auth::user()->role_id == 1)
                        {{-- <form action="importExcel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary d-inline">Import User Data</button>
                                </div>
                            </div>
                        </form> --}}
                        <div class="d-flex bd-highlight mb-3 mt-3">
                            <a href="studentAdd" class="btn btn-primary p-2 bd-highlight me-3">
                                Add
                                Student <i class="fas fa-user-plus"></i></a>
                            <a href="exportPDF" class="btn btn-danger p-2 bd-highlight me-3">Export PDF <i
                                    class="fas fa-solid fa-file-pdf"></i></a>
                            <a href="exportExcel" class="btn btn-success p-2 bd-highlight me-3">Export Excel <i
                                    class="fas fa-file-excel"></i></a>
                            <form action="importExcel" method="POST" enctype="multipart/form-data" class="ms-auto">
                                @csrf
                                <div class="row">
                                    <div class="col-8">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-success d-inline"><i class="fas fa-upload"></i>
                                            Import Excel </button>
                                    </div>
                                </div>
                            </form>
                            {{-- <a href="importExcel" class="btn btn-success p-2 bd-highlight">Import Excel <i
                                    class="fas fa-solid fa-file-pdf"></i></a> --}}
                            {{-- <a href="softDelete" class="btn btn-secondary text-light ms-auto p-2 bd-highlight"><i
                                class="fas fa-recycle"></i> Trash</a> --}}
                        </div>
                    @elseif(Auth::user()->role_id == 2)
                        <div class="d-flex bd-highlight mb-3">
                            <a href="studentAdd" class="btn btn-primary p-2 bd-highlight me-3">
                                Add
                                Student <i class="fas fa-user-plus"></i></a>
                            <a href="exportPDF" class="btn btn-danger p-2 bd-highlight me-3">Export PDF <i
                                    class="fas fa-solid fa-file-pdf"></i></a>
                            <a href="exportExcel" class="btn btn-success p-2 bd-highlight ">Export Excel <i
                                    class="fas fa-file-excel"></i></a>
                            <form action="importExcel" method="POST" enctype="multipart/form-data" class="ms-auto">
                                @csrf
                                <div class="row">
                                    <div class="col-8">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-success d-inline"><i class="fas fa-upload"></i>
                                            Import Excel </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    @endif

                    <form action="" method="get">
                        <div class="row">
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Keyword for search..."
                                        aria-label="Search..." aria-describedby="button-addon2" name="keyword">
                                    <button class="btn btn-outline-primary rounded" type="submit"
                                        id="button-addon2">Search</button>
                                </div>
                            </div>
                            @if (Auth::user()->role_id == 1)
                                <div class="col">
                                    <div class="float-end">
                                        <a href="softDelete"
                                            class="btn btn-secondary text-light ms-auto p-2 bd-highlight"><i
                                                class="fas fa-recycle"></i> Trash</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                </div>
                </form>

                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congrats!</strong> {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- todo buat manggil validasi kalau yang di import ada yang beda --}}
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <strong>Warning! </strong> {{ $error }} <br>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            {{-- <th>ID Class</th> --}}
                            <th>NIM</th>
                            <th>Class ID</th>
                            <th>Gender</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        {{-- kalau pake paginate, buat nomernya pake ini --}}
                        <?php $i = $listStudent->firstItem(); ?>
                        @forelse ($listStudent as $student)
                            <tr>
                                {{-- <td>{{ $loop->iteration +  }}</td> --}}
                                <td>{{ $i++ }}</td>
                                <td>{{ $student['name'] }}</td>
                                {{-- buat manggil ONE TO MANY KEK GINI --}}
                                {{-- <td>{{ $student->class->name }}</td> --}}
                                <td>{{ $student['nim'] }}</td>
                                <td>{{ $student->class->name }}</td>
                                <td>{{ $student['gender'] }}</td>
                                <td>{{ $student->created_at->format('D/d/m/Y') }}</td>
                                <td>{{ $student->updated_at->diffForHumans() }}</td>
                                <td>
                                    @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                                        <div class="text text-warning">Must Admin or Teacher</div>
                                    @else
                                        <a href="student/{{ $student->id }}" class="text-decoration-none"
                                            style="color: darkgreen"><i class="fas fa-info-circle"></i> </a>
                                        <a href="studentEdit/{{ $student->id }}"><i class="fas fa-user-edit"></i></a>
                                    @endif
                                    {{-- kalau role yang masuk itu admin, maka tampilkan delete --}}
                                    @if (Auth::user()->role_id == 1)
                                        <a href="studentDelete/{{ $student->id }}" style="color:crimson"><i
                                                class="fas fa-trash-alt"></i></a>
                                    @endif
                                </td>
                                {{-- <td> --}}
                                {{-- buat manggil HASMANY RELATIONSHIP KEK GINI --}}
                                {{-- @foreach ($student->extracurriculars as $e)
                                    - {{ $e['name'] }} <br>
                                    @endforeach --}}
                                {{-- </td> --}}
                                {{-- buat manggil NESTED RELATIONSHIP KEK GINI --}}
                                {{-- <td>{{ $student->class->homeroomTeacher->name }}</td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" align="center">
                                    <div class="alert alert-info">
                                        Data student not found!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </table>

                </div>
                <div class="mb-5">
                    {{-- {{ $listStudent->links() }} --}}
                    {{-- * biar kalau cari terus pindah page data tetep ada --}}
                    {{ $listStudent->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
