<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <!-- Include CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

@include('template.navbar')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Barang</h4>
                        <p class="card-description">List of all parfum items.</p>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <!-- Button to open add new parfum modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addParfumModal">
                                        Tambah Barang
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Table displaying parfums -->
                        <div class="table-responsive mt-3">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Parfum</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($parfums as $parfum)
                                    <tr>
                                        <td>{{ $parfum->id }}</td>
                                        <td>{{ $parfum->nama_parfum }}</td>
                                        <td>{{ $parfum->kategori ? $parfum->kategori->kategori : 'N/A' }}</td>
                                        <td>Rp {{ number_format($parfum->harga, 0, ',', '.') }}</td>

                                        <td>{{ $parfum->deskripsi }}</td>
                                        <td>
                                            @if($parfum->img)
                                                <img src="data:image/jpeg;base64,{{ base64_encode($parfum->img) }}" alt="{{ $parfum->nama_parfum }}" style="max-width: 100px;">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Buttons for editing and deleting -->
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editParfumModal" data-id="{{ $parfum->id }}" data-nama_parfum="{{ $parfum->nama_parfum }}" data-id_kategori_parfum="{{ $parfum->id_kategori_parfum }}" data-harga="{{ $parfum->harga }}" data-deskripsi="{{ $parfum->deskripsi }}" data-img="{{ $parfum->img }}">Edit</button>
                                            <form action="{{ route('admin.barangs.destroy', $parfum->id) }}" method="POST" style="display:inline;" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding new parfum -->
    <div class="modal fade" id="addParfumModal" tabindex="-1" role="dialog" aria-labelledby="addParfumModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addParfumModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addParfumForm" action="{{ route('admin.barangs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_parfum">Nama Parfum</label>
                            <input type="text" class="form-control" id="nama_parfum" name="nama_parfum" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori_parfum">Kategori</label>
                            <select class="form-control" id="id_kategori_parfum" name="id_kategori_parfum" required>
                                <!-- Populate categories dynamically -->
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">Gambar</label>
                            <input type="file" class="form-control-file" id="img" name="img">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for editing parfum -->
    <div class="modal fade" id="editParfumModal" tabindex="-1" role="dialog" aria-labelledby="editParfumModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editParfumModalLabel">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editParfumForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_nama_parfum">Nama Parfum</label>
                            <input type="text" class="form-control" id="edit_nama_parfum" name="nama_parfum" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_id_kategori_parfum">Kategori</label>
                            <select class="form-control" id="edit_id_kategori_parfum" name="id_kategori_parfum" required>
                                <!-- Populate categories dynamically -->
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_harga">Harga</label>
                            <input type="number" class="form-control" id="edit_harga" name="harga" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="edit_deskripsi" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_img">Gambar</label>
                            <input type="file" class="form-control-file" id="edit_img" name="img">
                            <small>Leave blank if you don't want to change the image.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('template.footer')

    <!-- Include JS -->
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <!-- Include Bootstrap JS for modal functionality -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>


        // Handle form submissions for add and edit modals
        $('#addParfumForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Parfum added successfully!',
                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to add parfum. Please try again.',
                    });
                }
            });
        });

        $('#editParfumModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var namaParfum = button.data('nama_parfum');
            var idKategoriParfum = button.data('id_kategori_parfum');
            var harga = button.data('harga');
            var deskripsi = button.data('deskripsi');
            var img = button.data('img');

            var modal = $(this);
            modal.find('#editParfumForm').attr('action', '/admin/barangs/' + id);
            modal.find('#edit_nama_parfum').val(namaParfum);
            modal.find('#edit_id_kategori_parfum').val(idKategoriParfum);
            modal.find('#edit_harga').val(harga);
            modal.find('#edit_deskripsi').val(deskripsi);
        });

        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            var form = this;
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
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>
