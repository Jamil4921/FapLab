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
        <h2>product edit</h2>
        <form action="/admin/productedit/{{ $product->id }}" method="POST">
            @csrf
            @method('PUT')
            <label>Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control">

            <label>Product price</label>
            <input type="range" name="price" id="price" min="0" max="500" value="{{ $product->price }}" oninput="result.value = price.value" class="form-control">
            <br>
            <input type="text" id="result" value="{{ $product->price }}">
            <br>
            <br>

            <label>Product details</label>
            <input type="text" name="details" id="details"  value="{{ $product->details }}" class="form-control">


            <button type="submit" class="btn btn-success">Update</button>
            <a href="/admin/product" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection    