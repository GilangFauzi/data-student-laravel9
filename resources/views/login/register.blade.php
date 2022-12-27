<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- ICON FONT AWSOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <title>Register</title>
</head>

<body>
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center ">
            <div class="col-sm-5">
                <div class="card shadow ">
                    <div class="card-header bg-primary bg-gradient">
                        <div class="text-center text-light">
                            <b>Please Registrasi</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">

                            @csrf
                            @if (Session::has('message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Sorry!</strong> {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                    required value="{{ old('name') }}">
                                @error('name')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                    required value="{{ old('email') }}">
                                @error('email')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Role</label>
                                <select class="form-select" aria-label="Default select example" name="role_id">
                                    <option selected>Open this select role</option>
                                    @foreach ($roles as $role)
                                        @if ($role->role->name != 'Admin')
                                            <option value="{{ $role->role_id }}">{{ $role->role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">Re-Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" required>
                                @error('password2')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary bg-gradient">Regist</button>
                            <a href="login" class="btn btn-primary bg-gradient float-end">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>
