@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="coll">
                <div class="jumbotron">
                    <h1 class="display-4">Wellcome! </h1>
                    <p class="lead">Extracurricular : <b>{{ $eskul->name }}</b></p>
                    <hr class="my-4">
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Student</th>
                    </tr>
                    <tr>
                        <td>
                        @foreach ($eskul->student as $item)
                            - {{ $item->name }} <br>
                        @endforeach
                    </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
