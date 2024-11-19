@extends('layout.admin-layout')

@section('home-content')

<h2 class="mb-4">QUIZ - online examination systum</h2>
<h2 class="mb-4">Question & Answers </h2>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="background-color:#A22B2D; " data-toggle="modal" data-target="#addsubject">
    Add Question
  </button>


  {{-- <table> </table> --}}

<table class="table  table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Question</th>
      <th scope="col">Answer </th>
      
    </tr>
  </thead>
  <tbody>
    {{-- @foreach ($answers as $answer) --}}
   @foreach ($questions as $question)
     
  
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$question->question}}</td>
    
  
      <td>                {{-- <table> </table> --}}

    {{$question->answer[0]['answer']}}
              
         </td>
     
    
    </tr>

    @endforeach
 
  </tbody>
</table>
  
   <!-- Modal -->
   <div class="modal fade" id="addsubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

    
      <div class="modal-content">
        <div class="modal-header">
          
          <h5 class="modal-title" id="exampleModalLongTitle">Add a Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('addquiz')}}" method="post"> 
            @csrf

       
      @if(Session::has('message'))
      <p style="color: green;"> {{ Session('message') }} </p>
    @endif
        <div class="modal-body">
            
            <label for="question">Question :</label> <br>
              <input type="text" placeholder="Add Question " name="question" class="w-100"> <br>

            <label for="answer">Answer :</label> <br>
            <input type="radio" name="is_correct" >
              <input type="text" placeholder="Add option" name="answers[]" class="w-90 "> <br>
            <input type="radio" name="is_correct">
              <input type="text" placeholder="Add option" name="answers[]" class="w-90 mt-4"> <br>
            <input type="radio" name="is_correct"> 
              <input type="text" placeholder="Add option" name="answers[]" class="w-90 mt-4"> <br>
            <input type="radio" name="is_correct">
              <input type="text" placeholder="Add option" name="answers[]" class="w-90 mt-4"> <br>
           
            
               
              @if($errors->any())

              @foreach ($errors->all() as $error)
                  <p style="color: red;">{{$error}}</p>
               @endforeach
            @endif
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Question</button>
        </div>
    </div>
</form>
    </div>
  </div>


  {{-- //show answer --}}
     <!-- Modal -->
     <div class="modal fade" id="Answer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
  
      
        <div class="modal-content">
          <div class="modal-header">
            
            <h5 class="modal-title" id="exampleModalLongTitle">Answer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

         
       
          <div class="modal-body">
        

              
              
                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
          </div>
      </div>
  </form>
      </div>
    </div>

@endsection