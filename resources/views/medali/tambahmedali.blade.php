@extends('layout.argon')

@section('content')

<body>
    <h1 class="text-white text-center mb-5 mt-5">Tambah Data Medali</h1>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="m-0">
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/insertdatamedali" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Negara</label>
                            <select class="form-select" name="negara" aria-label="Default select example">

                                <option value="0" selected>Pilih Negara</option>
                                @foreach ($datanegara as $data)
                                <option value="{{$data->nama}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('negara')
                            <div class="alert alert-danger">Harus di isi</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Emas</label>
                            <input type="text" name="emas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            @error('emas')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Perak</label>
                            <input type="text" name="perak" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            @error('perak')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Perunggu</label>
                            <input type="text" name="perunggu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            @error('perunggu')
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