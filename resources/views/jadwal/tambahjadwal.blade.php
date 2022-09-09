@extends('layout.sky')

@section('content')

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Atur Jadwal Pertandingan</h4>
                            <form action="/insertdatajadwal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Negara 1</label>
                                    <select class="form-control" name="id_negara1" aria-label="Default select example">

                                        <option value="0" selected>Pilih Negara 1</option>
                                        <br />
                                        @foreach ($datanegara as $dt)
                                        <option value="{{$dt->id}}">{{$dt->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_negara1')
                                    <div class="alert alert-danger">Harus di isi</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Negara 2</label>
                                    <select class="form-control" name="id_negara2" aria-label="Default select example">

                                        <option value="0" selected>Pilih Negara 2</option>
                                        <br />
                                        @foreach ($datanegara as $dn)
                                        <option value="{{$dn->id}}">{{$dn->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_negara2')
                                    <div class="alert alert-danger">Harus di isi</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="exampleInputEmail1" class="form-label">Cabang Olahraga</label>
                                    <div class="m-0">
                                        @foreach ($datacabang as $dc)
                                        <input class="form-input" type="radio" name="id_cabangolahraga" value="{{$dc->id}}">
                                        <label class="form-check-label">
                                            {{$dc->cabangolahraga}}
                                        </label>
                                        @endforeach
                                    </div>

                                    @error('id_cabangolahraga')
                                    <div class="alert alert-danger">Harus di isi</div>
                                    @enderror
                                </div>
                                <br />
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal</label>

                                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('tanggal')
                                    <div class="alert alert-danger">Harus di isi</div>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
                <script>
                    config = {
                        minDate: "today",
                    }
                    flatpickr("input[type=date]", config);
                </script>
</body>
@endsection