@extends('app')
@section('content')
    <div class="container">
        <h1>Halaman Home</h1>
        <div class="card">
            <div class="card-header">
                <h3>Data
                    <button class="btn btn-primary btn-sm float-end" onClick="create()">
                        <i class="fa fa-plus-circle"> Add</i></button>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="tabel1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
    @include('modal')
    @push('js')
        @include('script')
    @endpush
@endsection
