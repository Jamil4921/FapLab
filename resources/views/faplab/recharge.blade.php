@extends('layouts.app')
@section('content')
<html>
<head>
</head>
<body>
    <main>
        <div class="container">
            <div class="container">
                <h1>{{$student->student_name}}</h1>
                <h3>Your balance : € {{$student->amount}}</h3> <br>
             <form action="/add_amount/{{$student->id}}" method="POST" >
                @csrf     
                @method('PUT')
                 <label for="name">Add amount</label>
                 <input type="range" name="amount" id="amount" min="5" max="500" oninput="result.value = amount.value" class="form-control">
                 <br>
                 <h4>€ </h4>  <input type="text" id="result" value=""/>
                 <br>
                 <br>
                 <input type="submit" class="btn btn-success" value="Top up"></a>
             </form>
            </div>
            <br>
        </div>
        <div class="container">
            <p class="msg">{{session('updaterecharge')}}</p>
            <p class="msg">{{session('fund')}}</p>
        </div>
    </main>
    

@endsection   