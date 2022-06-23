@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="title">
            <h1>Detail Category</h1>
            </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$category->name}}</td>
                    <td>{{Auth::user()->name}}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{route ('categories.index')}}" style="background-color: gray" class="btn btn-gray">Kembali</a>
    </div>
@endsection