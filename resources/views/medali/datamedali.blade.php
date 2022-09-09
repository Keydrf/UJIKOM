@extends('layout.sky')
@push('css')

@endpush
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="content-wrapper">

    <div class="container">


        <div class="row">
            <h1 class="text-black text-center mb-1 mt-1">Perolehan Medali</h1>

            <table class="table table-bordered table-light" id="medali">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Negara</th>
                        <th scope="col">Emas</th>
                        <th scope="col">Perak</th>
                        <th scope="col">Perunggu</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php
                    $no = 1;
                    @endphp
                    @foreach($datanegara as $neg)
                    <?php
                    $goldtotal = 0;
                    $silvertotal = 0;
                    $bronzetotal = 0;
                    ?>
                    @foreach($neg->pemenang as $dp)
                    <?php
                    if ($dp->medali == "Emas") {
                        $goldtotal++;
                    } elseif ($dp->medali == "Perak") {
                        $silvertotal++;
                    } else {
                        $bronzetotal++;
                    }
                    ?>
                    @endforeach
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $neg->nama }}</td>
                        <td>{{ $goldtotal }}</td>
                        <td>{{ $silvertotal }}</td>
                        <td>{{ $bronzetotal}}</td>
                    </tr>
                    @endforeach

            </table>

        </div>
    </div>
</div>


@endsection

@push('scripts')
<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#medali').DataTable();
    });
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
                text: "Kamu akan menghapus data peserta dengan nama" + nama + "",
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
@endpush