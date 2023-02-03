<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Export PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .table {
            background: url('img/masbro.jpg') center no-repeat;
            background-color: #f4f4f4
        }

        .table th td {
            font-size: 29px
        }

        .table thead tr th {
            border: solid #000
        }

        .table tbody tr td {
            border: solid #000
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <table class='table table-bordered my-5'>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Content</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($posts as $post)
                    <tr>
                        <td scope="row">{{ $i++ }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
