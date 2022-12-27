@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="coll">
                <div class="jumbotron">
                    <h1 class="display-4">Hello World! </h1>
                    <p class="lead">Teacher : <b>{{ $teacher->name }}</b></p>
                    <hr class="my-4">
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Class ID</th>
                        <th>Student</th>
                    </tr>
                    <tr>
                        <td>
                            {{-- @foreach ($teacher->class as $item)
                                - {{ $item->name }} <br>
                            @endforeach --}}
                            @if ($teacher->class)
                                {{ $teacher->class->name }}
                            @else
                                <p>Class not found!</p>
                            @endif
                        </td>
                        <td>
                            @if ($teacher->class)
                                @foreach ($teacher->class->student as $mhs)
                                    {{-- @empty --}}
                                    - {{ $mhs->name }} <br>
                                @endforeach
                            @else
                                <p>Student not found!</p>
                            @endif

                            {{-- @if ($teacher->class->student)
                                - {{ $teacher->class->student->name }} <br>
                            @else
                                <p>Student not found!</p>
                            @endif --}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
