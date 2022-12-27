@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="coll">
                <div class="jumbotron">
                    <h1 class="display-4">Wellcome in class {{ $class->name }}! </h1>
                    <p class="lead">Homeroom Teacher : <b>{{ $class->homeroomTeacher->name }}</b></p>
                    <hr class="my-4">
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Class ID</th>
                        <th>Student</th>
                        <th>Homeroom Teacher</th>
                    </tr>
                    <tr>
                        <td>{{ $class->name }}</td>
                        <td>
                            @foreach ($class->student as $item)
                                - {{ $item->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ $class->homeroomTeacher->name }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
