{{-- input fields --}}
<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" value="{{ $data->nama }}">
</div>
{{-- <input type="hidden" name="id" id="id"> --}}

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="alamat" value="{{ $data->alamat }}">
</div>

<div class="mb-3">
    <label for="telp" class="form-label">Telepon</label>
    <input type="text" class="form-control" id="telp" value="{{ $data->telp }}">
</div>

{{-- input fields end --}}

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" id="tutup" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary save-update" id="simpan">Save</button>
</div>
