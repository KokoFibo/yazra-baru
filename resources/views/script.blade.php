<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        isi()
    });

    function create() {
        $.get("{{ route('data.create') }}", {}, function(data, status) {
            $('#modalTitle').html('Add Customer');
            $('#page').html(data);
            $('#exampleModal').modal('show');
        });
    }

    function isi() {
        $('#tabel1').DataTable({
            serverside: true,
            responsive: true,
            ajax: {
                url: "{{ route('data.index') }}"
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

<script>
    function store() {
        $.ajax({
            url: "{{ route('data.store') }}",

            type: "POST",
            data: {
                nama: $('#nama').val(),
                alamat: $('#alamat').val(),
                telp: $('#telp').val(),
                "_token": "{{ csrf_token() }}"
            },

            success: function(res) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#tutup').click();
                $('#tabel1').DataTable().ajax.reload();
                clearFields();
            },
            error: function(err) {
                let error = err.responseJSON;
                $('.alert-danger').removeClass('d-none');
                $('.alert-danger').html('<ul>');
                $.each(error.errors, function(key, value) {
                    $('.alert-danger').find('ul').append(
                        "<li>" + value +
                        "</li>");

                });
            }

        })
    }

    function clearFields() {
        $('#nama').val(null);
        $('#alamat').val(null);
        $('#telp').val(null);
        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');
        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    }
</script>

<script>
    // Edit Data
    $('body').on('click', '.tombol-edit', function(e) {
        let id = $(this).data('id');
        $.ajax({
            url: 'data/' + id + '/edit',
            type: 'get',
            success: function(data) {
                $('#modalTitle').html('Edit Customer');
                $('#page').html(data);
                $('#exampleModal').modal('show');

                $('.save-update').click(function() {
                    $.ajax({
                        url: 'data/' + id,
                        type: 'put',
                        data: {
                            nama: $('#nama').val(),
                            alamat: $('#alamat').val(),
                            telp: $('#telp').val(),
                            "_token": "{{ csrf_token() }}"
                        },

                        success: function(response) {

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your work has been saved lho',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            clearFields()
                            $('.btn-close').click();
                            $('#tabel1').DataTable().ajax.reload();
                        },
                        error: function(err) {
                            let error = err.responseJSON;
                            $('.alert-danger').removeClass('d-none');
                            $('.alert-danger').html('<ul>');
                            $.each(error.errors, function(key, value) {
                                $('.alert-danger').find('ul').append(
                                    "<li>" + value +
                                    "</li>");
                            });
                        }
                    });
                });
            }
        });
    });

    function create() {
        $.get("{{ route('data.create') }}", {}, function(data, status) {
            $('#modalTitle').html('Add Customer');
            $('#page').html(data);
            $('#exampleModal').modal('show');
        });
    }
</script>

<script>
    //Proses Delete
    $('body').on('click', '.tombol-del', function(e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).data('id');
                $.ajax({
                    url: 'data/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
            $('#tabel1').DataTable().ajax.reload();
            $('#tabel1').DataTable().ajax.reload();
        })
    });
</script>
