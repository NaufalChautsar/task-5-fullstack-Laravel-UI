@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="title">
            <h1>Tambah Article</h1>
        </div>
        <form class="row g-3" action="{{route ('articles.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Title</label>
              <input name="title" type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Content</label>
              <input name="content" type="text" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Image</label>
                <input name="image" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Category Name</label>
              <select name="category_id" id="inputState" class="form-select">
                @foreach ($category as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection