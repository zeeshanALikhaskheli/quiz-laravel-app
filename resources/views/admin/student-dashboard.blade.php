@extends('layout.admin-layout')


@section('home-content')
<h2 class="mb-4">QUIZ - online examination systum</h2>
<h2 class="mb-4">Students</h2>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="background-color:#A22B2D; " data-toggle="modal" data-target="#addsubject">
    Add Student
  </button>

{{-- <table> </table> --}}

<table class="table  table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email </th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
   
     @foreach ($students as $student)
       
    
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$student->name}}</td>
        <td>{{$student->email }}</td>
      
    
        <td> <a href="#" >Edit</a></td>
      </tr>
      @endforeach
   
    </tbody>
  </table>


   <!-- Modal -->
   <div class="modal fade" id="addsubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

    
      <div class="modal-content">
        <div class="modal-header">
          
          <h5 class="modal-title" id="exampleModalLongTitle">Add a subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('addStudent')}}" method="post"> 
            @csrf

       
      @if(Session::has('message'))
      <p style="color: green;"> {{ Session('message') }} </p>
    @endif
        <div class="modal-body">
            
            <label for="name">Name :</label> <br>
              <input type="text" placeholder="Enter  Student name " name="name" class="w-100"> <br>
            <label for="email">Mail :</label> <br>
              <input type="email" placeholder="( Mail ID )" name="email" class="w-100"> <br>
           
            
               
              @if($errors->any())

              @foreach ($errors->all() as $error)
                  <p style="color: red;">{{$error}}</p>
               @endforeach
            @endif
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send Mail</button>
        </div>
    </div>
</form>
    </div>
  </div>

@endsection