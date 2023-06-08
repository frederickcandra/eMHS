@extends('layouts/main')
@section('title', 'Mahasiswa')
@section('content')
@if(session('success'))
 <div class="alert alert-success">
 {{ session('success') }}
 </div>
@endif

    <div class="card mt-4">
        <div class="card-header">
            <a href="/mahasiswa/formtambah" class "btn btn-primary" role "Button" > <i class="bi bi-plus-square-fill"></i> Mahasiswa </a>
            <form action="/mahasiswa/cari" method="GET" class="form-inline float-right">
                <input name="q"  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
              </form>
              <a href="/mahasiswa/nimasc" class="btn btn-primary">Nim Ascending</a>
              <a href="/mahasiswa/namaasc" class="btn btn-primary">Nama Ascending</a>
              <a href="/mahasiswa/nimdesc" class="btn btn-primary">Nim Descending</a>

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Minat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>    
                <tbody>
                    @foreach ($mhs as $idx => $d)
                        <tr>
                            <th scope="row">{{ $mhs ->firstItem()+$idx }}</th>
                            <td>{{ $d->nim }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->gender }}</td>
                            <td>{{ $d->prodi }}</td>
                            <td>{{ $d->minat }}</td>
                            <td>
                                <a href="/mahasiswa/formedit/{{ $d->nim }}" class = "btn btn-success" role="button"><i class="bi bi-pencil-square"></i></a>
                                <a href="/mahasiswa/delete/{{ $d->nim }}" class = "btn btn-danger" role="button"><i class="bi bi-file-earmark-x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="float-right">{{ $mhs->links() }}</span>
        </div>
    </div>
@endsection
