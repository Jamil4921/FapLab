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
        <h1>Add new product </h1> <br>
        <div class="container">
         <form action="/admin/product" method="POST">
            @csrf
             <label for="name">Product name</label>
             <input type="text" name="name" id="name" class="form-control">
            <br>
             <label for="name">Product price</label>
             <input type="range" name="price" id="price" min="0" max="500" oninput="result.value = price.value" class="form-control">
             <br>
             <input type="text" id="result" value=""/>
             <br>
             <br>

             <label for="name">Product details</label>
             <input type="text" name="details" id="details" class="form-control">
              <br>
             <input type="submit" class="btn btn-success" value="Add">
         </form>
        </div>
        <br>
    </div>
@endsection   