@extends('layout.layout')


@section('content')
<div class="container">
    <form action="{{ route('user_register')}}" method="POST">
        @csrf

        <img src="logo.png" alt="" width="100%">
      <div class="title">Register</div>
      @if($errors->any())

      @foreach ($errors->all() as $error)
          <p style="color: red;">{{$error}}</p>
       @endforeach
    @endif
    @if(Session::has('message'))
    <p style="color: green;"> {{ Session('message') }} </p>
  @endif

      <div class="input-box underline">
        <input type="text" value="{{old('name')}}" placeholder="Name" name="name" >
   

        <div class="underline"></div>
      </div>
      <div class="input-box underline">
        <input type="text" value="{{old('email')}}" placeholder="Enter Your Email" name="email" >
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="password"  placeholder="Enter Your Password" name="password" >
        <div class="underline"></div>
      </div>
      <div class="input-box button">
        <input type="submit" name="submit" value="Register">
      </div>

   
    </form>
   
      <div class="option">or already have a account ? <a href="/login"> login <a></div>

      {{-- social media links  --}}
      {{-- <div class="twitter">
        <a href="#"><i class="fab fa-twitter"></i>Sign in With Twitter</a>
      </div>
      <div class="facebook">
        <a href="#"><i class="fab fa-facebook-f"></i>Sign in With Facebook</a>
      </div> --}}
  </div>
  



@endsection