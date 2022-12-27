@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Hello, {{ $student->name }}!</h1>
                    <p class="lead">Ini merupakan halaman detail data mahasiswa</p>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                @if ($student->image)
                                    <img src="{{ asset('storage/' . $student->image) }}" class="card-img-top" alt="..."
                                        style="height: 15rem;">
                                @else
                                    <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&fm=jpg&fit=crop&w=1080&q=80&fit=max"
                                        class="card-img-top" alt="..." style="height: 16rem;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $student->name }}</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk
                                        of
                                        the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>NIM</th>
                                    <th>Gender</th>
                                    <th>Class</th>
                                    <th>Homeroom Teacher</th>
                                </tr>
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->nim }}</td>
                                    <td>{{ $student['gender'] }}</td>
                                    <td>{{ $student->class->name }}</td>
                                    <td>{{ $student->class->homeroomTeacher->name }}</td>
                                    {{-- kalau pake hasMany harus di looping dulu --}}
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col">
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
@endsection
