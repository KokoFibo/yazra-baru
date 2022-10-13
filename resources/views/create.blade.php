{{-- input fields --}}
<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap">
</div>
{{-- <input type="hidden" name="id" id="id"> --}}

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat ">
</div>

<div class="mb-3">
    <label for="telp" class="form-label">Telepon</label>
    <input type="text" class="form-control" id="telp" placeholder="Masukkan Telepon ">
</div>

{{-- input fields end --}}

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" id="tutup" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" onClick="store()" id="simpan">Save</button>
</div>