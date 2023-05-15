@extends('layouts.admin')

@section('title', 'Poli Umum')

@section('content')
    <div class="col-xxl col-xl-12">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">
                    <div class="text-primary">Daftar Antrian Poli Gigi</div>
                </h5>
                <br>
                <table class="table">
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
