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
        <a href="{{ route('sheets.create') }}">Upload a new Sheet</a>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sheets as $sheet)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $sheet->name }}</td>
                    <td>
                        <a href="{{ route('sheets.view', $sheet) }}">view</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>