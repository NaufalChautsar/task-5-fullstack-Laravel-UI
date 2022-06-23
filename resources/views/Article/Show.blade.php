@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="title">
            <h1>Detail Article</h1>
            </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image</th>
                    <th scope="col">Username</th>
                    <th scope="col">Category Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$article -> title}}</td>
                    <td>{{$article -> content}}</td>
                    <td><img src="{{asset('images/Article/'.$article->image)}}" style="height: 220px; width: 290px;" alt="{{$article->image}}"></td>
                    <td>{{Auth::user()->name}}</td>
                    <td>{{$article -> category_id}}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{route ('articles.index')}}" style="background-color: gray" class="btn btn-gray">Kembali</a>
    </div>
@endsection