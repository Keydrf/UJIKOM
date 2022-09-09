@extends('layout.sky')
@push('css')

@endpush
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container">
    <h1 class="text-black text-center mb-1 mt-1">Negara</h1>
    <a href="/tambahnegara" class="btn btn-success">Tambah +</a>


    <div class="row">

        <!-- @if ($message =Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>

        @endif -->
        <table class="table table-bordered table-light" id="negara_id">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Negara</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php
                $no = 1;
                @endphp
                @foreach ($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>
                        <a href="/tampilnegara/{{ $row->id }}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus</a>


                    </td>
                </tr>

                @endforeach

        </table>
        <div class="pull-right">
            {{ $data->links() }}
        </div>
    </div>
    </a>
</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

<!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $('#negara_id').DataTable();
    });
</script>
<script>
    @if(Session::get('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->



</body>
<script>
    $('.delete').click(function() {
        var negaraid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal(" Maaf ", " Data masih digunakan ");
    });
</script>

<script>
    $('.delete').click(function() {
        var negaraid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
                title: "Apakah kamu yakin?",
                text: "Kamu akan menghapus data negara " + nama + "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletenegara/" + negaraid + ""
                    swal("Data berhasil dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>
<script>
    @if(Session::has('info'))
    swal("Data berhasil dihapus", {
        icon: "success",
    });
    @endif
</script>
<script>
    @if(Session::has('gagal'))
    swal("Data masih digunakan", {
        icon: "warning",
    });
    @endif
</script>


@endsection

@push('scripts')

@endpush