@extends('layouts.admin')

@section('title', 'Poli Gigi')

@section('content')
    <div class="col-xxl col-xl-12">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">
                    <div class="text-primary">Daftar Antrian Poli Gigi</div>
                </h5>
                <a href="/admin/cetak"><button type="submit" class="btn btn-primary">Cetak</button></a>
                <br>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor Antrian</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($antrian as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_antrian }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
