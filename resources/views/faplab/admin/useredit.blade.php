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
        <h2>User edit</h2>
        <form action="/admin/useredit/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <label>Give role</label>
            <select name="role" id="role">
                <option value="1">Admin</option>
                <option value="0">User</option>
            </select>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/admin/home" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection    