<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel Upload</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
    <div class="container mt-5">
        <a href="{{ route('sheets.index') }}">All Sheets</a>

        <div class="mt-5">
            <h2 class="text-center">{{ $name }}</h2>
        </div>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    @foreach ($columns as $column)
                    <th scope="col">{{ $column->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    @foreach (json_decode($row->data) as $value)
                    <td>{{ $value }}</td>
                    @endforeach

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>