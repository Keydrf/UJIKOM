@extends('layout.argon')

@section('content')



<body>
    <h1 class="text-white text-center mb-5 mt-5">Update Data</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="m-0">
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/updatedatamedali/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Negara</label>
                            <select class="form-select" name="negara" aria-label="Default select example">
                                <option selected>{{ $data->negara }}</option>
                                @foreach ($datanegara as $dg)
                                <option value="{{$dg->nama}}">{{$dg->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Emas</label>
                            <input type="text" name="emas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $emasindonesia }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Perak</label>
                            <input type="text" name="perak" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->perak }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Perunggu</label>
                            <input type="text" name="perunggu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->perunggu }}">
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