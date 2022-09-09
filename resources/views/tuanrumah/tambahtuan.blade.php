@extends('layout.sky')

@section('content')

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Tuan Rumah</h4>
                            <form action="/insertdatatuanrumah" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Edisi</label>
                                    <input type="text" name="edisi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('edisi')
                                    <div class="alert alert-danger">Harus di isi</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Negara</label>
                                    <select class="form-control" name="id_tuanrumah" aria-label="Default select example">

                                        <option value="0" selected>Pilih Negara</option>
                                        @foreach ($datanegara as $da)
                                        <option value="{{$da->id}}">{{$da->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_tuanrumah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kota</label>
                                    <input type="text" name="kota" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('edisi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('tanggal')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Upload Foto Negara</label>
                                    <input type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('foto')
                                    <div class="alert alert-danger">{{ $message }}</div>
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