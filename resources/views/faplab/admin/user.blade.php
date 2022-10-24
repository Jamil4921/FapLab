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
        <h1>User info </h1> <br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">User role</th>
                  </tr>
                  <?php $role = ""; ?>
                  <?php if($user->role == "1"){
                      $role = "Admin";
                        } elseif ($user->role == "0") {
                            $role = "User";
                        }?>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $role }}</td>
                  </tr>
                </tbody>
              </table>
              {{--<h2>Total price : € {{$price}}</h2> --}}
    </div>
        <br>


        <div class="container">
        
            <h1>User Purchases </h1> <br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                  </tr>
                  
                
                
                  @foreach ($order as $order)
                  
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $order->product_name }}</td>
                    <td> X {{ $order->quantity }}</td>
                    <td>€ {{ $order->price }}</td>
                  </tr>
                </tbody>
                @endforeach 
              </table>
        </div>
@endsection   