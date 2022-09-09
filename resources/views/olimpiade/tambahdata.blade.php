@extends('layout.sky')

@section('content')

<body>



    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Peserta</h4>
                            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Peserta</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('nama')
                                    <div class="alert alert-danger">Harus di isi</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                    <div class="m-3">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="flexRadioDefault1">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="m-3">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Perempuan
                                        </label>
                                    </div>
                                    @error('jenis_kelamin')
                                    <div class="alert alert-danger">Harus di isi</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="exampleInputEmail1" class="form-label">Cabang Olahraga</label>
                                    <div class="mb-3">
                                        @foreach ($datacabang as $dc)
                                        <input class="form-input" type="checkbox" name="id_olimpiade[]" value="{{$dc->id}}">
                                        <label class="form-check-label">
                                            {{$dc->cabangolahraga}}
                                        </label>
                                        @endforeach
                                    </div>

                                    @error('id_olimpiade')
                                    <div class="alert alert-danger">Harus di isi</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Asal Negara</label>
                                    <br />
                                    <select class="form-control" name="id_negara" aria-label="Default select example">

                                        <option value="0" selected>Pilih Negara</option>
                                        @foreach ($datanegara as $dn)
                                        <option value="{{$dn->id}}">{{$dn->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_negara')
                                    <div class="alert alert-danger">Harus di isi</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Upload Foto Peserta</label>
                                    <input type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('foto')
                                    <div class="alert alert-danger">Upload foto dengan ekstensi: jpg, jpeg, png, gif, svg</div>
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