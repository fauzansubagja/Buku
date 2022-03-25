@extends('app.main')

@section('main')

@if ($errors->any())
    <div class="container-fluid">
        <div class="row mt-4 mb-2 fw-bold fs-4 justify-content-center">
            <div class="col-md-10">
                <div class="alert-danger rounded text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-4 mt-2">
            <div class="ml-1">
                <a href="{{ route('Books.index') }}" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('Books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="mb-3">
                    <label for="judul" class="form-label fw-bold">Judul</label>
                    <input type="text" class="form-control" id="judul" aria-describedby="emailHelp" name="judul">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label fw-bold">Author</label>
                    <input type="text" class="form-control" id="author" name="author">
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label fw-bold">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" aria-describedby="emailHelp" name="penerbit">
                </div>
                <div class="mb-3">
                    <label for="Sinopsis" class="form-label fw-bold">Sinopsis</label>
                    <textarea name="sinopsis" class="form-control" id="Sinopsis"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>   
</form>
@endsection