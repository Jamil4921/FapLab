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
        <h1>Producten </h1> <br>
        <div class="product">
                <div>
                   <h1>{{ $product->name }}</h1> <br>
                    <h2>€ {{ $product->price }}</h2> <br>
                    <h3>{{ $product->details }}</h3> <br>
                </div>
        </div>
        <br>
        <a href="/admin/home">back</a>
    </div>
@endsection   