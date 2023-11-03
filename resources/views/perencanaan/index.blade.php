@extends('templates.index')
@section('head')
<link href="{{ url('/') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <h6 class="mb-0 text-uppercase">Perencanaan Aset</h6>
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
                                <h5 class="modal-title">Tambah Perencanaan Aset</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('perencanaan.create') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputNamaAset" class="form-label">Nama Aset</label>
                                        <input type="text" class="form-control" id="inputNamaAset" placeholder="Masukan Nama Aset" name="nama_aset" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="selectKategori" class="form-label">Kategori</label>
                                        <select class="form-control" id="selectKategori" name="id_kategori" required>
                                            @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputJumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" id="inputJumlah" placeholder="Masukan Jumlah Aset" name="jumlah" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="selectSatuan" class="form-label">Satuan</label>
                                        <select class="form-control" id="selectSatuan" name="id_satuan" required>
                                            @foreach ($satuan as $item)
                                            <option value="{{ $item->id }}">{{ $item->satuan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputHarga" class="form-label">Harga</label>
                                        <input type="number" class="form-control" id="inputHarga" placeholder="Masukan Harga Satuan" name="harga" required>
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
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perencanaan as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->nama_aset }}</td>
                                <td>{{ $item->kategori->kategori }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->satuan->satuan }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalPerencanaanEdit-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> <i class="bx bx-edit"></i> </button>
                                    <form action="{{ route('perencanaan.delete', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"> <i class="bx bx-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="modalPerencanaanEdit-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Perencanaan Aset</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('perencanaan.update', $item->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                @method('put')
                                                <div class="col-12">
                                                    <label for="inputNamaAset" class="form-label">Nama Aset</label>
                                                    <input type="text" class="form-control" id="inputNamaAset" placeholder="Masukan Nama Aset" name="nama_aset" value="{{ $item->nama_aset }}" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="selectKategori" class="form-label">Kategori</label>
                                                    <select class="form-control" id="selectKategori" name="id_kategori" required>
                                                        @foreach ($kategori as $itemKat)
                                                        <option {{ $itemKat->id == $item->id_kategori ? 'selected' : '' }} value="{{ $itemKat->id }}">{{ $itemKat->kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputJumlah" class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control" id="inputJumlah" placeholder="Masukan Jumlah Aset" name="jumlah" value="{{ $item->jumlah }}" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="selectSatuan" class="form-label">Satuan</label>
                                                    <select class="form-control" id="selectSatuan" name="id_satuan" required>
                                                        @foreach ($satuan as $itemSat)
                                                        <option {{ $itemSat->id == $item->id_satuan ? 'selected' : '' }} value="{{ $itemSat->id }}">{{ $itemSat->satuan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputHarga" class="form-label">Harga</label>
                                                    <input type="number" class="form-control" id="inputHarga" placeholder="Masukan Harga Satuan" name="harga" value="{{ $item->harga }}" required>
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
