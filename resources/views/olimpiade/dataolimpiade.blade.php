<?php

use App\Models\CabangOlahraga;

?>

@extends('layout.sky')
@push('css')

@endpush
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<!-- <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="/">Halaman</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Peserta</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Peserta</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">

                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="/logout" class="nav-link text-white font-weight-bold px-0">
                        <i class="fa fa-sign-out-alt me-sm-1"></i>
                        <span class="d-sm-inline d-none">Log Out</span>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav> -->

<body>
    <div class="content-wrapper">

        <div class="container">
            <h1 class="text-black text-center mb-1 mt-1">Peserta </h1>
            <a href="/tambahdata" class="btn btn-success">Tambah +</a>


            <div class="row">

               

               
                <table class="table table-bordered table-light" id="id_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Peserta</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Cabang Olahraga</th>
                            <th scope="col">Negara Asal</th>
                            <th scope="col">Foto Peserta</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($peserta as $row)
                        @php
                        $explode = explode(', ', $row->id_olimpiade);
                        @endphp
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->jenis_kelamin }}</td>
                            <td>
                                @foreach($explode as $exp)
                                @php
                                $cabor = CabangOlahraga::find($exp);
                                @endphp
                                {{ $cabor->cabangolahraga }},
                                @endforeach
                            </td>
                            <td>{{ $row->negara->nama }}</td>

                            <td>
                                <img src="{{ asset('fotopeserta/'.$row->foto) }}" alt="" style="width: 80px; height:80px;">
                            </td>


                            <td>
                                <a href="/tampilkandata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus</a>
                            </td>
                        </tr>
                        @endforeach

                </table>
                <div class="pull-right">
                    {{ $peserta->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#id_table').DataTable();
        });
    </script>

    <script>
        @if(Session::get('success'))
        toastr.success("{{ Session::get('success') }}")
        @endif
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


</body>
<script>
    $('.delete').click(function() {
        var pesertaid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
                title: "Apakah kamu yakin?",
                text: "Kamu akan menghapus data peserta dengan nama " + nama + "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete/" + pesertaid + ""
                    swal("Data berhasil dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>





@endsection

@push('scripts')

@endpush