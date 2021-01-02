@extends('layout')

@section('content')
    <h1>Restaurent List:</h1>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                      <a href="/resto/delete/{{$item->id}}"><i class="fa fa-trash">Del</i></a>
                      <a href="/resto/edit/{{$item->id}}"><i class="fa fa-edit">Edit</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
