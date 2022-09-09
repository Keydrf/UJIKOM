@extends('layout.sky')

@section('content')

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Pemenang</h4>
                            <form action="/insertdatapemenang" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Peserta</label>
                                    <br />
                                    <select class="form-control" name="id_nama" aria-label="Default select example">

                                        <option value="0" selected>Nama Peserta</option>
                                        @foreach ($datanama as $dana)
                                        <option value="{{$dana->id}}">{{$dana->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_nama')
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
                                <div>
                                    <label for="exampleInputEmail1" class="form-label">Medali</label>
                                    <div class="m-3">
                                        <input class="form-check-input" type="radio" name="medali" value="Emas" id="flexRadioDefault1">
                                        <label class="form-check-label" for="medali">
                                            Emas
                                        </label>
                                    </div>
                                    <div class="m-3">
                                        <input class="form-check-input" type="radio" name="medali" value="Perak" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Perak
                                        </label>
                                    </div>
                                    <div class="m-3">
                                        <input class="form-check-input" type="radio" name="medali" value="Perunggu" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Perunggu
                                        </label>
                                    </div>
                                    @error('medali')
                                    <div class="alert alert-danger">Pilihlah salah satu</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Asal Negara</label>
                                    <br />
                                    <select class="form-control" name="id_negara" aria-label="Default select example">

                                        <option value="0" selected>Pilih Negara</option>
                                        @foreach ($datanegara as $da)
                                        <option value="{{$da->id}}">{{$da->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_negara')
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
</body>
@endsection