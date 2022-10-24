@extends('layouts.app')
@section('content')
    
 
    <main>
          <div class="ehb">
            <img src="/img/ehb-logo.jpg">
          </div>
         
              
          <div class="ehbButton">
            <a class="btn btn-lg" href="/product" style="background-color: #e40613; color: #FFFF">Producten</a>
            <a class="btn btn-lg" href="/recharge/{{$user->id}}" style="background-color: #e40613; color: #FFFF">Recharge</a>
          </div>  
        
    </main>
    <div class="container">
      <h1 class="msg" style="text-align: center">{{session('msg')}}</h1>
    </div>
@endsection
