@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="coll">
                <div class="jumbotron">
                    <h1 class="display-4">Hello, {{ $name }}</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p>
                    <hr class="my-4">
                    <div class="btn btn-primary mb-3">Add Extracurricular</div>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No</th>
                            <th>Extracurricular</th>
                            <th>Action</th>
                        </tr>
                        {{-- @forelse ($listStudent as $student) --}}
                        @foreach ($eskul as $e)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $e['name'] }}</td>
                                <td> <a href="extracurricular/{{ $e->id }}"><i
                                            class="fas fa-envelope-open-text"></i></a></td>
                                {{-- kalau pake hasMany atau manyToMany harus di looping dulu --}}
                                {{-- <td>
                                    @foreach ($e->student as $anggota)
                                        - {{ $anggota->name }} <br>
                                    @endforeach
                                </td> --}}

                            </tr>
                        @endforeach
                        {{-- @if (count($eskul))
                            <span" class=" mb-3">
                                Data Extracurricular <span class="badge bg-light text-dark">{{ count($eskul) }}</span>
                                </span>
                            @else
                                <span class="btn btn-primary mb-3">
                                    Data Extracurricular <span class="badge bg-light text-dark">{{ count($eskul) }}</span>
                                </span>
                                <tr>
                                    <td colspan="4" align="center">
                                        Data extracurricular not found!
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
