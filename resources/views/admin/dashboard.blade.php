@extends('layout/admin-layout')

@section('home-content')
<h2 class="mb-4">QUIZ - online examination systum</h2>
<h2 class="mb-4">Subjects</h2>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="background-color:#A22B2D; " data-toggle="modal" data-target="#addsubject">
    Add subject
  </button>

{{-- <table> </table> --}}

<table class="table  table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject</th>
      <th scope="col">created_at </th>
      {{-- <th scope="col">Action</th> --}}
    </tr>
  </thead>
  <tbody>
   @if(count($subjects)>0)
   @foreach ($subjects as $subject)
     
  
    <tr>
      <th scope="row">{{$subject->id}}</th>
      <td>{{$subject->subject}}</td>
      <td>{{$subject->created_at->format('D/d/m/Y')}}</td>
      {{-- <td> <a href="#" >Edit</a></td> --}}
    </tr>
    @endforeach
    @endif
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

        <form action="{{route('addSubject')}}" method="post"> 
          @csrf
       
      @if(Session::has('message'))
      <p style="color: green;"> {{ Session('message') }} </p>
    @endif
        <div class="modal-body">
            
            <label for="subject">Subject :</label>
              <input type="text" placeholder="Enter  subject name " name="subject" class="w-100" >
           
            
               
              @if($errors->any())

              @foreach ($errors->all() as $error)
                  <p style="color: red;">{{$error}}</p>
               @endforeach
            @endif
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
    </div>
  </div>

  {{-- <script>
    $(document).ready(function(){
        $("#addsubject").submit(function(e){
            e.preventDefault();

            var formData=$(this).serialize();

            $.ajax({
                url:"{{ route('addSubject')}}",
                type:"POST",
                data:formData,
                success:function(data){
                   if(data.success==true){
                        location.reload();
                   }
                   else{
                    alert(data.msg);
                   }
                }
            });
        });
    });
  </script> --}}

@endsection