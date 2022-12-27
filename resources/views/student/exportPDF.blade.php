<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <title>Export PDF</title>
</head>

<body>
    <h2 style="text-align: center">Data Student Borcess</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Class ID</th>
            <th>Gender</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        @foreach ($student as $mhs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                {{-- <td>{{ $i++ }}</td> --}}
                <td>{{ $mhs['name'] }}</td>
                <td>{{ $mhs['nim'] }}</td>
                <td>{{ $mhs->class->name }}</td>
                <td>{{ $mhs['gender'] }}</td>
                <td>{{ $mhs->created_at->format('D/d/m/Y') }}</td>
                <td>{{ $mhs->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
