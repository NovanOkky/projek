<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center">Laporan Antrian {{ $poli }}</h1>
    <table class="table mt-3 justify-content-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor Antrian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($no_antrian as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->no_antrian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
