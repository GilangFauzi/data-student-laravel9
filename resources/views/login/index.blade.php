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
    <title>Login</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('logout'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Cangrats!</strong> {{ session('logout') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('register'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Cangrats!</strong> {{ session('register') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center ">
            <div class="col-sm-5">
                <div class="card shadow ">
                    <div class="card-header bg-primary bg-gradient">
                        <div class="text-center text-light">
                            <b>Please Login</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" required value="{{ old('email') }}" autofocus>
                                @error('email')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                {{-- @error('password')
                                    <div class="text text-danger">{{ $message }}
                                    </div>
                                @enderror --}}
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary bg-gradient col-3 ">Login</button>
                            </div>
                            {{-- <a href="register" class="btn btn-primary bg-gradient float-end">Register</a> --}}
                        </form>
                        <small class="d-block text-center mt-3">Not registered? <a href="/register">Register
                                Now!</a></small>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container">
        <div class="row">
            <div class="col">
                <main class="form-signin">
                    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>
                    <small class="d-block text-center mt-3">Not registered? <a href="/register">Register
                            Now!</a></small>
                </main>
            </div>
        </div>
    </div> --}}


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>
