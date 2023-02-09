<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if (session('errors'))
            <p class="alert alert-danger">{{ session('errors') }}</p>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h1>Register</h1>
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group my-4">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group my-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group my-4">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group my-4">
                        <label for="k_password">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Submit</button>
                    <a href="{{ route('home') }}" style="text-decoration: none;color:black;"><button type="button"
                            class="btn btn-warning mx-2">Kembali</button></a>
                    <a href="{{ route('login') }}" style="text-decoration: none;"><button type="button"
                            class="btn btn-info mx-2 text-white">Login</button></a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
