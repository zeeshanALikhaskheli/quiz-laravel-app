@extends('layout.admin-layout')


@section('home-content')
<h2 class="mb-4">QUIZ - online examination systum</h2>
<h2 class="mb-4">Exams</h2>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="background-color:#A22B2D; " data-toggle="modal" data-target="#addexam">
    Add Exam
  </button>


  
{{-- <table> </table> --}}

<table class="table  table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Exam</th>
        <th scope="col">Subject </th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Show Questions</th>
        <th scope="col">Questions</th>
   
      </tr>
    </thead>
    <tbody>
   
     @foreach ($exams as $exam)
       
    
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$exam->exam}}</td>
        <td>{{$exam->subjects[0]['subject']}}</td>
        <td>{{$exam->date}}</td>
        <td>{{$exam->time}}</td>
        <td><a href="#" class="seeQuestions" data-id="{{$exam->id}}" data-toggle="modal" data-target="#seeQnaModel">Show Question</a></td>
        <td><a href="#" class="addQuestion" data-id="{{$exam->id}}" data-toggle="modal" data-target="#addqna">Add Question</a></td>
    
       
      </tr>
      @endforeach
   
    </tbody>
  </table>


  <!-- See question Modal -->
    <div class="modal fade" id="seeQnaModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  
                  <h5 class="modal-title" id="exampleModalLongTitle">Show Questions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
      
    
          <div class="modal-body">
              
    
          <table class="table" id="questionsTable">
            <thead>
              <tr>
                <td>#</td>
                <td>Queestion</td>
                <td>Action</td>

              </tr>
            </thead>
            <tbody class="seeQuestionsTable">
              <td>

              </td>
              <td></td>
            </tbody>

          </table>
     
              
                
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      
      </div>
      </div>
      </div>
  <!-- Modal -->
    <div class="modal fade" id="addqna" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Questions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <form id="addQnas"> 
             
              @csrf
          
      
          
         
    
          <div class="modal-body">
              
            <input type="hidden" name="exam_id" id="addexamid">
            <input type="search" name="search" id="search" onkeyup="searchTable()" class="w-100"  placeholder="Search here..">
            <br><br>

                
      @if(Session::has('message'))
      <p style="color: green;"> {{ Session('message') }} </p>
    @endif
             
    @if($errors->any())

    @foreach ($errors->all() as $error)
        <p style="color: red;">{{$error}}</p>
     @endforeach
  @endif
    
          <table class="table" id="questionsTable">
            <thead>
              <tr>
                <td>Select</td>
                <td>Queestion</td>
              </tr>
            </thead>
            <tbody class="addbody">
              <td>

              </td>
              <td></td>
            </tbody>

          </table>
     
              
                
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
       </form>
      </div>
      </div>
      </div>


    <!-- Modal -->
    <div class="modal fade" id="addqna" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Questions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <form id="addQnas"> 
             
              @csrf
          
      
          
         
    
          <div class="modal-body">
              
            <input type="hidden" name="exam_id" id="addexamid">
            <input type="search" name="search" id="search" onkeyup="searchTable()" class="w-100"  placeholder="Search here..">
            <br><br>

                
      @if(Session::has('message'))
      <p style="color: green;"> {{ Session('message') }} </p>
    @endif
             
    @if($errors->any())

    @foreach ($errors->all() as $error)
        <p style="color: red;">{{$error}}</p>
     @endforeach
  @endif
    
          <table class="table" id="questionsTable">
            <thead>
              <tr>
                <td>Select</td>
                <td>Queestion</td>
              </tr>
            </thead>
            <tbody class="addbody">
              <td>

              </td>
              <td></td>
            </tbody>

          </table>
     
              
                
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
       </form>
      </div>
      </div>
      </div>
    <!-- Modal -->
    <div class="modal fade" id="addqna" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Questions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <form id="addQnas"> 
             
              @csrf
          
      
          
         
    
          <div class="modal-body">
              
            <input type="hidden" name="exam_id" id="addexamid">
            <input type="search" name="search" id="search" onkeyup="searchTable()" class="w-100"  placeholder="Search here..">
            <br><br>

                
      @if(Session::has('message'))
      <p style="color: green;"> {{ Session('message') }} </p>
    @endif
             
    @if($errors->any())

    @foreach ($errors->all() as $error)
        <p style="color: red;">{{$error}}</p>
     @endforeach
  @endif
    
          <table class="table" id="questionsTable">
            <thead>
              <tr>
                <td>Select</td>
                <td>Queestion</td>
              </tr>
            </thead>
            <tbody class="addbody">
              <td>

              </td>
              <td></td>
            </tbody>

          </table>
     
              
                
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
       </form>
      </div>
      </div>
      </div>


  <!-- Modal -->
  <div class="modal fade" id="addexam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{route('addexam')}}" method="post"> 
                @csrf

       
      @if(Session::has('message'))
      <p style="color: green;"> {{ Session('message') }} </p>
    @endif
        <div class="modal-body">
            
            <label for="exam">Exam :</label>
              <input type="text" placeholder="Exam name" name="exam" class="w-100"> <br>
              <label for="subject">Select Subject :</label>
              <select name="subject_id" class="w-100">
                <option value="">Select subject</option>
           
                @foreach ($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->subject}}</option>

                @endforeach
                
              </select>
          
              <br>
              <label for="date">Date :</label>
              <input type="date"  name="date" class="w-100" min="@php echo date('Y-m-d') @endphp"> <br>

              <label for="time">Duration :</label>
              <input type="time"  name="time" class="w-100" > <br>

            
               
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
    </form>
    </div>
    </div>
    </div>

    <script>
      $(document).ready(function() {
    
        // Include CSRF token for POST requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        // Add question functionality
        $('.addQuestion').click(function() {
    
            var id = $(this).attr('data-id');
            $('#addexamid').val(id);
    
            $.ajax({
                url: "{{ route('getQuestion') }}",
                type: "GET",
                data: {exam_id:id},
                success: function(data) {
    
                    if (data.success === true) {
                        var questions = data.data;
                        var html = '';
    
                        if (questions.length > 0) {
                            questions.forEach(function(question) {
                                html += `
                                <tr>
                                    <td><input type="checkbox" value="${question.id}" name="questions_ids[]"></td>
                                    <td>${question.questions}</td>
                                </tr>`;
                            });
                        } else {
                            html = '<tr><td colspan="2">No questions available.</td></tr>';
                        }
    
                        $('.addbody').html(html);
                    } else {
                        // Handle case where data.success is not true
                        console.error('Failed to load questions:', data.message);
                        alert('Failed to load questions. Please try again.');
                    }
    
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                    alert('An error occurred while fetching questions. Please try again later.');
                }
            });
    
        });
    
        $("#addQnas").submit(function(e){
          e.preventDefault();

          var formData=$(this).serialize();


          $.ajax({
            url:"{{route('added')}}",
            type:"POST",
            data:formData,
            success:function(data){

              if(data.success==true){
                location.reload();

              }
             
            }


          });

        });

        // See question 


         $('.seeQuestions').click(function() {
    
            var id = $(this).attr('data-id');
            // $('#addexamid').val(id);



           
    $.ajax({
        url: "{{ route('getExamsQuestions') }}",
        type: "GET",
        data: { exam_id: id },
        success: function(data) {
          //  console.log(data);

          var html = '';
          var questions = data.data;

                        // <td>${question.question[0].question}</td>

    
                        if (questions.length > 0) {
                          questions.forEach(function(question) {

                            // console.log(question.question[0].question);
                    html +=`
                    <tr>
                      <td></td>
                        <td>${question.question[0].question}</td>
                      <td><button class="btn btn-danger deleteQuestion" data-id="${question.question[0].id}">Remove </button></td>
                    </tr>`;
                });
                        } else {
                            html += '<tr><td colspan="2">No questions available.</td></tr>';
                        }

                        $('.seeQuestionsTable').html(html);
                        
                     


           
        }
     
    });


         });
        
     
    
      });


     // Event listener for deleting a question
$(document).on('click', '.deleteQuestion', function() {
    var id = $(this).attr('data-id');  // Get the question ID from 'data-id' attribute
    var $row = $(this);  // Get the closest row to the clicked delete button

    $.ajax({
        url: "{{ route('deleteExamQuestions') }}",  // Route to delete the question
        type: "GET",  // Use GET method (consider using DELETE for deletions)
        data: { id: id },  // Send the question ID to the server
        success: function(data) {
            if (data.success === true) {
                // Remove the row from the table
                $row.parent().parent().remove();
            } else {
                console.error('Failed to delete question:', data.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error deleting question:', status, error);
        }
    });
});

    </script>

<script>
  function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();

    table = document.getElementById('questionsTable');
    tr = table.getElementsByTagName('tr');  // Corrected this line

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[1];  // Corrected this line
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {  // Corrected 'indexof' to 'indexOf'
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      } else {
        tr[i].style.display = "none";
      }
    }
  }
</script>
    
@endsection