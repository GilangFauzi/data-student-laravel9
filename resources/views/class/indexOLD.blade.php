@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="coll">
                <div class="jumbotron">
                    <h1 class="display-4">Hello, {{ $name }}!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p>
                    <hr class="my-4">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No</th>
                            <th>Class Name</th>
                            <th>Action</th>
                        </tr>
                        <div class="btn btn-primary mb-3">Add Class</div>
                        {{-- @forelse ($listStudent as $student) --}}
                        @foreach ($class as $classRoom)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $classRoom['name'] }}</td>
                                <td> <a href="classDetail/{{ $classRoom->id }}"><i class="fas fa-envelope-open-text"></i></a>
                                </td>
                                {{-- kalau pake hasMany harus di looping dulu --}}
                                {{-- <td>
                                    @foreach ($classRoom->student as $student)
                                        - {{ $student->name }} <br>
                                    @endforeach
                                </td>
                                <td>{{ $classRoom->homeroomTeacher->name }}</td>
                                <td>{{ $classRoom['created_at'] }}</td>
                                <td>{{ $classRoom['updated_at'] }}</td> --}}
                            </tr>
                        @endforeach
                        {{-- @if (count($class))
                            <span" class="btn btn-primary mb-3">
                                Data Class <span class="badge bg-light text-dark">{{ count($class) }}</span>
                                </span>
                            @else
                                <span" class="btn btn-primary mb-3">
                                    Data Class <span class="badge bg-light text-dark">{{ count($class) }}</span>
                                    </span>
                                    <tr>
                                        <td colspan="4" align="center">
                                            Data student not found!
                                        </td>
                                    </tr>
                        @endif --}}
                        {{-- @endforelse --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
