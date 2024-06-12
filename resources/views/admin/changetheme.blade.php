<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Themes</title>
    <link rel="stylesheet" href="{{ asset('/sign-in-up.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <a href="{{ url('/admin') }}">Admin Panel</a>
        <h1>Edit Themes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($themes as $theme)
                <tr>
                    <td>{{ $theme->id }}</td>
                    <td>{{ $theme->name }}</td>
                    <td>
                        <a href="{{ route('themes.edit', $theme->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
