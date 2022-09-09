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
                            <form action="/updatedatapemenang/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Peserta</label>
                                    <br />
                                    <select class="form-control" name="id_nama">
                                        @foreach ($datanama as $da)
                                        <option value="{{$da->id}}" @if ($data->olimpiade->id == $da->id) selected @endif>
                                            {{ $da->nama }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                                <label for="exampleInputEmail1" class="form-label">Cabang Olahraga</label>
                                <div class="m-3">
                                    @foreach ($datacabang as $dc)
                                    <input type="radio" name="id_cabangolahraga" value="{{$dc->id}}" <?php if ($data->id_cabangolahraga == $dc->id) echo 'checked' ?>>
                                    <label class="form-check-label">
                                        {{ $dc->cabangolahraga }}
                                    </label>
                                    @endforeach
                                </div>
                                <label for="exampleInputEmail1" class="form-label">Medali</label>
                                <div class="m-3">
                                    <input class="form-check-input" type="radio" name="medali" value="Emas" id="flexRadioDefault1" <?php if ($data['medali'] == 'Emas') echo 'checked' ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Emas
                                    </label>
                                </div>
                                <div class="m-3">
                                    <input class="form-check-input" type="radio" name="medali" value="Perak" id="flexRadioDefault1" <?php if ($data['medali'] == 'Perak') echo 'checked' ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perak
                                    </label>
                                </div>
                                <div class="m-3">
                                    <input class="form-check-input" type="radio" name="medali" value="Perunggu" id="flexRadioDefault1" <?php if ($data['medali'] == 'Perunggu') echo 'checked' ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perunggu
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Asal Negara</label>
                                    <select class="form-control" name="id_negara">
                                        @foreach ($datanegara as $dn)
                                        <option value="{{$dn->id}}" @if ($data->negara->id == $dn->id) selected @endif>
                                            {{ $dn->nama }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                </div>


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