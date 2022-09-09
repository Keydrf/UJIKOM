@extends('layout.sky')

@section('content')



<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Data</h4>
                            <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Edisi</label>
                                    <input type="text" name="edisi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->edisi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Negara</label>
                                    <select class="form-control" name="id_tuanrumah">
                                        @foreach ($datanegara as $da)
                                        <option value="{{$da->id}}" @if ($data->negara->id == $da->id) selected @endif>
                                            {{ $da->nama }}
                                        </option>

                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Kota</label>
                                        <input type="text" name="kota" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->kota }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}">
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Foto</label>
                                    <br/>
                                    <img class="img mb-3" src="{{ asset('fototuanrumah/'.$data->foto) }}" alt="" style="width: 100px;">
                                    <input type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->foto }}">
                                    <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah profile penduduk</i>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Data</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</div>



@endsection