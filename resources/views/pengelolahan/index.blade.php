@extends('templates.index')
@section('head')
<link href="{{ url('/') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <h6 class="mb-0 text-uppercase">Pengelolahan</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                @auth

                <div class="text-end mb-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">Tambah</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalKategori" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Pengelolahan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('pengelolahan.create') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputNama" class="form-label">Nama Pengelolah</label>
                                        <select class="form-control" id="inputNama" name="id_pengelolah">
                                            @foreach ($pengelolah as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAset" class="form-label">Nama Aset</label>
                                        <select class="form-control" id="inputAset" name="id_aset">
                                            @foreach ($aset as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_aset }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputTanggalMulai" class="form-label">Tanngal Mulai Kelolah</label>
                                        <input type="date" class="form-control" id="inputTanggalMulai" name="tanggal_mulai_kelolah">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai Kelolah</label>
                                        <input type="date" class="form-control" id="inputTanggalSelesai" name="tanggal_selesai_kelolah">
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
                @endauth

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengelolah</th>
                                <th>Jabatan</th>
                                {{-- <th>Alamat</th> --}}
                                <th>No Telp</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Mulai Kelolah</th>
                                <th>Tanggal Selesai Kelolah</th>
                                @auth
                                <th>Aksi</th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengelolahan as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->pengelolah->nama }}</td>
                                <td>{{ $item->pengelolah->jabatan }}</td>
                                <td>{{ $item->pengelolah->no_telp }}</td>
                                <td>{{ $item->aset->nama_aset }}</td>
                                <td>{{ $item->aset->jumlah }}</td>
                                <td>{{ $item->tanggal_mulai_kelolah }}</td>
                                <td>{{ $item->tanggal_selesai_kelolah }}</td>
                                @auth
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalKategoriEdit-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> <i class="bx bx-edit"></i> </button>
                                    <form action="{{ route('pengelolahan.delete', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"> <i class="bx bx-trash"></i> </button>
                                    </form>
                                </td>
                                @endauth

                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="modalKategoriEdit-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Pengelolahan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('pengelolahan.update', $item->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                @method('put')
                                                <div class="col-12">
                                                    <label for="inputNama" class="form-label">Nama Pengelolah</label>
                                                    <select class="form-control" id="inputNama" name="id_pengelolah">
                                                        @foreach ($pengelolah as $val)
                                                        <option {{ $item->pengelolah->id == $val->id ? 'selected' : '' }} value="{{ $val->id }}">{{ $val->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputAset" class="form-label">Nama Aset</label>
                                                    <select class="form-control" id="inputAset" name="id_aset">
                                                        @foreach ($aset as $val)
                                                        <option {{ $item->aset->id == $val->id ? 'selected' : '' }} value="{{ $val->id }}">{{ $val->nama_aset }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputTanggalMulai" class="form-label">Tanngal Mulai Kelolah</label>
                                                    <input type="date" class="form-control" id="inputTanggalMulai" name="tanggal_mulai_kelolah" value="{{ $item->tanggal_mulai_kelolah }}">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai Kelolah</label>
                                                    <input type="date" class="form-control" id="inputTanggalSelesai" name="tanggal_selesai_kelolah" value="{{ $item->tanggal_selesai_kelolah }}">
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
