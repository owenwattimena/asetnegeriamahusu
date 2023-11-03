@extends('templates.index')
@section('head')
<link href="{{ url('/') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <h6 class="mb-0 text-uppercase">Master > Satuan</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <div class="text-end mb-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalSatuan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">Tambah</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalSatuan" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Satuan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('master.satuan.create') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputSatuan" class="form-label">Satuan</label>
                                        <input type="text" class="form-control" id="inputSatuan" placeholder="Masukan Satuan" name="satuan">
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
                                <th>Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($satuan as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalSatuanEdit-{{ $item->slug }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> <i class="bx bx-edit"></i> </button>
                                    <form action="{{ route('master.satuan.delete', $item->slug) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"> <i class="bx bx-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="modalSatuanEdit-{{ $item->slug }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Satuan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('master.satuan.update', $item->slug) }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                @method('put')
                                                <div class="col-12">
                                                    <label for="inputSatuan" class="form-label">Satuan</label>
                                                    <input type="text" class="form-control" id="inputSatuan" placeholder="Masukan Satuan" value="{{ $item->satuan }}" name="satuan">
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
