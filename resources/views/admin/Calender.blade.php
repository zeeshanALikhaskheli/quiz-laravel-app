@extends('layout.admin-layout')



@section('home-content')


<h2 class="mb-4">QUIZ - online examination system</h2>
<h2 class="mb-4">My Calender</h2>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" style="background-color:#A22B2D; " data-toggle="modal" data-target="#addsubject">
    Add event
  </button>


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

        <form action="{{route('addevent')}}" method="post"> 
          @csrf
       
      @if(Session::has('message'))
      <p style="color: green;"> {{ Session('message') }} </p>
    @endif
        <div class="modal-body">
            
            <label for="title">Event Title :</label>
              <input type="text" id="title" placeholder="Event title " name="title" class="w-100" > <br>
            <label for="description">Description :</label>
              <input type="text" placeholder="description.... " name="description" class="w-100" > <br>
              <label for="start">Starting Date :</label>
              <input type="date"  name="start" class="w-100" min="@php echo date('Y-m-d') @endphp"> <br>
              <label for="end">Ending Date :</label>
              <input type="date"  name="end" class="w-100" min="@php echo date('Y-m-d') @endphp"> <br>
           
            
               
              @if($errors->any())

              @foreach ($errors->all() as $error)
<                  p style="color: red;">{{$error}}</p>
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




<div id="calendar"></div>


<script src='{{ asset('fullcalendar/index.global.min.js')}}'></script>

<script>

document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            initialView: 'dayGridMonth',
            // initialDate: 'today',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            nowIndicator: true,
            dayMaxEvents: true, // allow "more" link when too many events
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [{
              
                title: 'conference',
                start: '2024-09-12',
                end: '2024-09-14',

            }]
         
        });
        calendar.render();
    });

// var calendarID=document.getElementById('calendar');
// var calendar= new FullCalendar.Calendar(calendarID,{
//     headerToolbar:{
//         left:'prev, next today',
//         center:'title',
//         right:'dayGridMonth,timeGridWeek,timeGridDay',
//     },
//     editable:true,
//     dateClick: function(info){
//         // console.log(info['date']);
//         window.prompt('Event Title');
        
//     },

// });
//  calendar.render();
    
</script>
@endsection