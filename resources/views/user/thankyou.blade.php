@extends('layout.user-layout')


@section('home-content')

<div class="container">

    <div class="text-center">
        <h2> Thank you {{Auth::user()->name}},your exam submitted  Successffully </h2>
        <h4>We will annouce the result by Mail </h4>



        <a href="/dashboard">Go to the Home Page</a>

    </div>

</div>

@endsection