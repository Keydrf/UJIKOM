@extends('layout.sky')

@section('content')


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data</h4>
                        <form action="/updatedatajadwal/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Negara1</label>
                                <br />
                                <select class="form-control" name="id_negara1">
                                    @foreach ($datanegara as $dn)
                                    <option value="{{$dn->id}}" @if ($data->negara1->id == $dn->id) selected @endif>
                                        {{ $dn->nama }}
                                    </option>

                                    @endforeach
                                </select>
                                @error('id_negara1')
                                <div class="alert alert-danger">Harus di isi</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Negara 2</label>
                                <br />
                                <select class="form-control" name="id_negara2">
                                    @foreach ($datanegara as $dt)
                                    <option value="{{$dt->id}}" @if ($data->negara2->id == $dt->id) selected @endif>
                                        {{ $dt->nama }}
                                    </option>

                                    @endforeach
                                </select>
                                @error('id_negara2')
                                <div class="alert alert-danger">Harus di isi</div>
                                @enderror
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
                            <div class=" mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->tanggal }}">
                                @error('tanggal')
                                <div class="alert alert-danger">Harus di isi</div>
                                @enderror
                            </div>

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