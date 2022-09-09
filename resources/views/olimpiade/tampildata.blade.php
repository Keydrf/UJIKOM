<?php

use App\Models\CabangOlahraga;

?>
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
                            <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Peserta</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nama }}">
                                </div>
                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                <div class="m-3">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="flexRadioDefault1" <?php if ($data['jenis_kelamin'] == 'Laki-laki') echo 'checked' ?>>
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="m-3">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="flexRadioDefault1" <?php if ($data['jenis_kelamin'] == 'Perempuan') echo 'checked' ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perempuan
                                    </label>
                                </div>
                                <label for="exampleInputEmail1" class="form-label">Cabang Olahraga:</label>
                                <div class="mb-3">

                                    @foreach ($datacabang as $dc)
                                    <?php $dar = explode(', ', $data->id_olimpiade) ?>

                                    <input type="checkbox" name="id_olimpiade[]" value="{{ $dc->id }}" <?php if (in_array('' . $dc->id, $dar)) echo 'checked'; ?>>
                                    <label class="form-check-label">
                                        {{$dc->cabangolahraga}}
                                    </label>
                                    @endforeach
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Asal Negara</label>
                                    <br />
                                    <select class="form-control" name="id_negara">
                                        @foreach ($datanegara as $dn)
                                        <option value="{{$dn->id}}" @if ($data->negara->id == $dn->id) selected @endif>
                                            {{ $dn->nama }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Foto</label>
                                    <br/>
                                    <img class="img mb-3" src="{{ asset('fotopeserta/'.$data->foto) }}" alt="" style="width: 100px;">
                                    <input type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->foto }}">
                                    <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah profile penduduk</i>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                </div>
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