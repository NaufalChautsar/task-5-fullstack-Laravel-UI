@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                &nbsp;  {{ session('status')}}
            </div>
        @endif
        <div class="title">
            <h1>Data Category</h1>
                <button>
                    <a class="btn-tambah-article" href="{{route ('categories.create')}}">Tambah
                      <i class="fa-thin fa-plus"></i>
                    </a>
                </button>
            </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{$loop -> iteration}}</td>
                        <td>{{$item -> name}}</td>
                        <td>{{Auth::user()->name}}</td>
                        <td class="inline text-center">
                            <a href="{{url('categories/'.$item->id)}}" class="btn btn-warning btn-sm">
                                Show
                            </a>
                            <a href="{{url('categories/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{url('categories/'.$item->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus data ini ?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection