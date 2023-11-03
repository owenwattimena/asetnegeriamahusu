@extends('templates.index')

@section('content')
<div class="text-center">
    <img class="mb-3" src="{{ asset('assets/images/spanduk-aset.png') }}" width="80%" alt="">
</div>
<div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 row-cols-xxl-3">
    <div class="col">
        <div class="card radius-10 bg-gradient-cosmic">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <p class="mb-0 text-white">Total Aset</p>
                        <h4 class="my-1 text-white">{{ $totalAset }}</h4>
                    </div>
                    <div class="parent-icon" style="font-size: 50px;">
                        <i class="bx bx-list-ol text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-gradient-ibiza">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <p class="mb-0 text-white">Total Pengelolah</p>
                        <h4 class="my-1 text-white">{{ $totalPengelolah }}</h4>
                    </div>
                    <div class="parent-icon" style="font-size: 50px;">
                        <i class="bx bx-user text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-gradient-ohhappiness">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <p class="mb-0 text-white">Total Aset Dikelolah</p>
                        <h4 class="my-1 text-white">{{ $totalAset }}</h4>
                    </div>
                    <div class="parent-icon" style="font-size: 50px;">
                        <i class="bx bx-user-plus text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
@endsection
