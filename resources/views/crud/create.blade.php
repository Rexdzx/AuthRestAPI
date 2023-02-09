<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post</title>
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
                <h1>Buat Post</h1>
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('store') }}">
                    @csrf
                    <div class="form-group my-4">
                        <label for="title">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <input type="text" name="content" class="form-control" required>
                    </div>
                    <div class="my-4">
                        <a href="{{ route('store') }}" style="text-decoration: none;"><button type="submit"
                                class="btn btn-info mx-2 text-white">Submit</button></a>
                        <a href="{{ route('home') }}" style="text-decoration: none;color:black;"><button type="button"
                                class="btn btn-warning mx-2">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
