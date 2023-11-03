@extends('templates.index')
@section('head')
<link href="{{ url('/') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <h6 class="mb-0 text-uppercase">Pengelolah</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <div class="text-end mb-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">Tambah</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalKategori" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Pengelolah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('pengelolah.create') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputNama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="inputNama" placeholder="Masukan Nama Pengelolah" name="nama">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputJabatan" class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" id="inputJabatan" placeholder="Masukan Jabatan" name="jabatan">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAlamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="inputAlamat" placeholder="Masukan Alamat" name="alamat">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputNoTelp" class="form-label">No. Telp</label>
                                        <input type="text" class="form-control" id="inputNoTelp" placeholder="Masukan No Telp" name="no_telp">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengelolah as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalKategoriEdit-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> <i class="bx bx-edit"></i> </button>
                                    <form action="{{ route('pengelolah.delete', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"> <i class="bx bx-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="modalKategoriEdit-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Pengelolah</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('pengelolah.update', $item->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                @method('put')
                                                <div class="col-12">
                                                    <label for="inputNama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="inputNama" placeholder="Masukan Nama Pengelolah" name="nama" value="{{ $item->nama }}">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputJabatan" class="form-label">Jabatan</label>
                                                    <input type="text" class="form-control" id="inputJabatan" placeholder="Masukan Jabatan" name="jabatan" value="{{ $item->jabatan }}">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputAlamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="inputAlamat" placeholder="Masukan Alamat" name="alamat" value="{{ $item->alamat }}">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputNoTelp" class="form-label">No. Telp</label>
                                                    <input type="text" class="form-control" id="inputNoTelp" placeholder="Masukan No Telp" name="no_telp" value="{{ $item->no_telp }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-warning">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
@endsection
@section('script')
<script src="{{ url('/') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>
@endsection
