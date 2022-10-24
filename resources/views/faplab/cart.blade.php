@extends('layouts.app')
@section('content')
<main>
    <div class="container">
        
        <h1>Your cart </h1> <br>
        <h2></h2>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Remove item</th>
              </tr>

              <?php $price = 0; ?>


              @foreach ($cart as $cart)
            </thead>
            <tbody>
              <tr>
                <td>{{ $cart->product_name }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>€ {{ $cart->price }}</td>
                <td>
                    <form action="/remove_cart/{{ $cart->id }}" method="POST">
                        @csrf
                            @method('DELETE')
                        <button class="btn btn-danger"> Remove </button>
                    </form>
                </td>
              </tr>
            </tbody>
            <?php $price = $price +  $cart->price ?>
            @endforeach 
          </table>
          <h2>Total price : € {{$price}}</h2>
    </div>
    <div class="container">
      <a href="/order" class="btn btn-danger"> Order</a>
    </div>
    <div class="container">
        <p>{{session('deletedItem')}}</p>
        <p>{{session('order')}}</p>
        <p>{{session('fund')}}</p>
    </div>
</main>
@endsection   