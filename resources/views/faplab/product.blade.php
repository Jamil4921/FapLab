@extends('layouts.app')
@section('content')
    <main>
    </main>
    <div class="container">
    <h1>Producten </h1> <br>
    <div class="proSec">
        @foreach ($product as $product)

        
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <h6 class="card-title">€ {{ $product->price }}</h6>
              <p class="card-text">{{ $product->details}}</p>
              <form action="/add_cart/{{ $product->id }}" method="POST">
                  @csrf
              <input type="number" value="1" name="quantity"  min="1" max="10"  class="form-control" >

               <br>

              <input type="submit"  value="Add to cart"  class="btn" style="background-color: #e40613; color: #FFFF">
              </form>
              <br>
              
              
            </div>
          </div>
        <br>
        @endforeach
    </div>
</div>
@endsection   