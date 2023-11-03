@extends('templates.index')
@section('head')
<link href="{{ url('/') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <h6 class="mb-0 text-uppercase">Master > Kategori</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <div class="text-end mb-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">Tambah</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalKategori" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('master.kategori.create') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputKategori" class="form-label">Kategori</label>
                                        <input type="text" class="form-control" id="inputKategori" placeholder="Masukan Kategori" name="kategori">
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
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalKategoriEdit-{{ $item->slug }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> <i class="bx bx-edit"></i> </button>
                                    <form action="{{ route('master.kategori.delete', $item->slug) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"> <i class="bx bx-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="modalKategoriEdit-{{ $item->slug }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('master.kategori.update', $item->slug) }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                @method('put')
                                                <div class="col-12">
                                                    <label for="inputKategori" class="form-label">Kategori</label>
                                                    <input type="text" class="form-control" id="inputKategori" placeholder="Masukan Kategori" value="{{ $item->kategori }}" name="kategori">
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
