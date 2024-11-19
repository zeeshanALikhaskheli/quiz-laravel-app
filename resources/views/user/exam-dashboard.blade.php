@extends('layout.user-layout')
@section('home-content')
<Center>

    <img src="{{asset('logo.png')}}" alt="" >

</Center>
{{-- <center>
      <h2 class="text-center" >Welcome {{Auth::user()->name}} </h2>
</center> --}}
 
<h3 >Candidate Details </h3>

<div class="row">


<div class="col">
  <p>Name : {{Auth::user()->name}} </p>
  <p>Email : {{Auth::user()->email}} </p>

</div>
<div class="col">

  <p>Exam : {{$exam[0]['exam']}} </p>
  <p>Date : {{$exam[0]['date']}}  </p>

</div>
<div class="col">


  <p>Duration : {{$exam[0]['time']}}  </p>
  <div id="timer"></div>
</div>
</div>

<h3 >Exam :  {{$exam[0]['exam']}}  </h3>
<h3 class="text-right" id="countdown" style="position: fixed;top:400px;right:100px;" > </h3>

<div>



@if($success==true)
    @if(count($qna)>0)

    <form action="{{route('examSubmit')}}" method="POST" class="mb-5" onsubmit="return isValid[]">
      @csrf
      
    @php
      $qcount=1;
      
    @endphp

          @foreach ($qna as $data )

            <h1>Q{{$qcount++}} . {{ $data['question'][0]['question']}}</h1>
            <input type="hidden" name="q[]" value="{{ $data['question'][0]['id']}}">
            <input type="hidden" name="ans_{{$qcount-1}}" id="ans_{{$qcount-1}}"> 
            <input type="hidden" name="exam_id" value="{{$exam[0]['id']}} " id="ans_{{$qcount-1}}"> 
            
            @php
              $acount=1;
            @endphp
            @foreach($data['answers'] as $answer )
              
            <p><input type="radio" name="radio_{{$qcount-1}}" value="{{$answer['id']}}" data-id="{{$qcount-1}}" class="select_ans" > <b> {{$acount++}} ).</b> {{$answer['answer']}}</p>
            @endforeach
            <br>
        
          @endforeach

          <div>
            <input type="submit" class="btn btn-info" value="submit">
          </div>
        </form>
@endif
@else
<p class="text-center" style="color:red">{{$msg}} </p>
@endif


</div>

<script>
  $(document).ready(function(){

    $('.select_ans').click(function(){

      var no = $(this).attr('data-id');
      $('#ans_' + no).val($(this).val());
        
    });
      
  });

  function isValid() {

    var result = false;
    // Add validation logic here

    var qlength=parseInt("{{$qcount}}")-1;

    alert(qlength);
    return result;
  }
</script>

<script>
        // Get exam start and end times from PHP (Laravel)
        var examEndTime = new Date("{{ $exam[0]['time']}} }}"); // Use Laravel to pass the end time
        
        // Function to start the countdown timer
        function startCountdown(endTime) {
            var countdownInterval = setInterval(function() {
                // Get current time
                var now = new Date().getTime();

                // Calculate the distance between now and the end time
                var distance = new Date(endTime).getTime() - now;

                // Time calculations for days, hours, minutes, and seconds
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the countdown in the "timer" element
                document.getElementById("timer").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";

                // If the countdown is finished, clear the interval and show "EXAM OVER"
                if (distance < 0) {
                    clearInterval(countdownInterval);
                    document.getElementById("timer").innerHTML = "EXAM OVER";
                    alert("Time's up!");
                    // Optionally submit the form or disable input fields here
                }
            }, 1000); // Update the timer every 1 second
        }

        // Start the countdown based on the exam end time
        startCountdown(examEndTime);
    </script>


@endsection

