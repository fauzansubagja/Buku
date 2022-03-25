@extends('app.main')

@section('main')
@if (session('success'))
    <div class="container-fluid">
        <div class="row mt-4 mb-2 fw-bold fs-4 justify-content-center">
            <div class="col-md-10">
                <div class="alert-success rounded text-center">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="container-fluid">
        <div class="row mt-4 mb-2 fw-bold fs-4 justify-content-center">
            <div class="col-md-10">
                <div class="alert-danger text-center">
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-center mt-5 mb-5">
                    <h1>Books</h1>
                </div>
                <table class="table table-hover table-bordered border-dark mt-5">
                    <thead align="center">
                        <a href="{{ route('Books.create') }}" class="btn btn-success">Tambah Buku</a>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Author</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody align="center">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($books as $book)
                        <tr>
                          <th scope="row">{{ $i++ }}</th>
                          <td>{{ $book->judul }}</td>
                          <td>{{ $book->author }}</td>
                          <td>
                            <a href="{{ url('Books', $book->id) }}" class="badge bg-secondary border border-dark border-2 text-decoration-none"><i class="bi bi-eye-fill"></i></a>
                            </td>
                          <td>{{ $book->penerbit }}</td>
                          <td>
                              <a href="Books/{{ $book->id }}/edit" class="badge bg-primary border border-dark border-2"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ url('Books', $book->id) }}" method="post" class="d-inline"> 
                                    @method('Delete')
                                    @csrf
                                    <button class="badge bg-warning"><i class="bi bi-trash"></i></button>
                                </form>
                          
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>        
            </div>
        </div>
    </div>
</div>



@endsection
