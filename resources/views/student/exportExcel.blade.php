<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Student</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>NIM</th>
                <th>Geder</th>
                <th>ID Class</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->nim }}</td>
                    <td>{{ $value->gender }}</td>
                    <td>{{ $value->class->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
