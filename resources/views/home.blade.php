@extends('app')
@section('content')
    <div class="container">
        <h1>Halaman Home</h1>
        <div class="card">
            <div class="card-header">
                <h3>Data</h3>
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
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


        <script>
            $(document).ready(function() {
                isi()
            });

            function isi() {
                $('#tabel1').DataTable({
                    serverside: true,
                    responsive: true,
                    ajax: {
                        url: "{{ route('data') }}"
                    },
                    columns: [{
                            "data": null,
                            "sortable": false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1
                            }
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat'
                        },
                        {
                            data: 'telp',
                            name: 'telp'
                        },
                        {
                            data: 'aksi',
                            name: 'aksi'
                        },
                    ]
                });

            }
        </script>
    @endpush
@endsection
