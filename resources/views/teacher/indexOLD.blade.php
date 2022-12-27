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
                    <a href="" class="btn btn-primary mb-3">Add Teacher</a>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No</th>
                            <th>Teacher Name</th>
                            <th>Action</th>
                        </tr>
                        {{-- @forelse ($listStudent as $student) --}}
                        @foreach ($teacher as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t['name'] }}</td>
                                <td> <a href="teacher/{{ $t->id }}"><i class="fas fa-envelope-open-text"></i></a>
                                </td>

                                {{-- kalau pake hasMany harus di looping dulu --}}
                            </tr>
                        @endforeach
                        @if (count($teacher))
                            <span" class="btn btn-primary mb-3">
                                Data Teacher <span class="badge bg-light text-dark">{{ count($teacher) }}</span>
                                </span>
                            @else
                                <span" class="btn btn-primary mb-3">
                                    Data teacher <span class="badge bg-light text-dark">{{ count($teacher) }}</span>
                                    </span>
                                    <tr>
                                        <td colspan="4" align="center">
                                            Data teacher not found!
                                        </td>
                                    </tr>
                        @endif
                        {{-- @endforelse --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
