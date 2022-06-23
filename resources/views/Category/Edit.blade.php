@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="title">
            <h1>Ubah Category</h1>
        </div>
        <form class="row g-3" action="{{url('categories/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-md-12">
              <label for="inputEmail4" class="form-label">Name</label>
              <input name="name" type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-12 mt-4">
                <a href="{{route ('categories.index')}}" class="btn btn-gray">Kembali</a>
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection