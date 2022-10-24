@extends('layouts.app')
@section('content')
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/admin/home">FapLab(admin)</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="/admin/product">Product catalogus </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="/admin/order">Show orders </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="/admin/create">Create product </a>
                  </li>
                </ul>
              </div>
          </nav> 
    </main>
    <div class="container">
    
        <h1>ADMIN PAGE </h1> <br>
        <p class="msg">{{session('msg')}}</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Details</th>
              <th scope="col">Delete</th>
              <th scope="col">Edit user</th>
            </tr>
          </thead>
          @foreach ($user as $user)
          <tbody>
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td> 
                  <a href="/admin/user/{{$user->id}}" class="btn btn-info"> Details</a>
              </td>
              <td> 
              </div>
                <form action="/admin/user/{{$user->id}}" method="POST">
                    @csrf
                        @method('DELETE')
                    <button class="btn btn-danger"> Delete user</button>
                </form>
          </div>
              </td>
              <td> 
                  <a href="/admin/useredit/{{$user->id}}" class="btn btn-dark">Edit user</a>
              </td>
            </tr>
          </tbody>
          @endforeach 
        </table>   
        <br>
  </div>
  <div class="container">
    <p class="msg">{{session('deletedUser')}}</p>
    <p class="msg">{{session('update')}}</p>
  </div>
    
@endsection   