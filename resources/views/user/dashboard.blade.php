@extends('layout.user-layout')


@section('home-content')


<h2 class="mb-4">QUIZ - online examination system</h2>
<h2 class="mb-4">Hi {{Auth::user()->name}}</h2>


  
{{-- <table> </table> --}}

<table class="table  table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Exam</th>
        <th scope="col">Subject </th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Copy Link</th>

   
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
        <td><a href="#" data-code="{{$exam->enterance_id}}" class="copy"><i class="fa fa-copy " style="font-size:33px" ></i> </a> </td>

    
       
      </tr>
      @endforeach
   
    </tbody>
  </table>
<script>
    $(document).ready(function(){
        $('.copy').click(function(){
            $(this).parent().prepend('<span class="copied_text"> Copied</span>');

            var code=$(this).attr('data-code');
            var url="{{URL::to('/')}}/exam/"+code;

            var $temp=$("<input>");

            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();


            setTimeout(() => {
                $('.copied_text').remove();
            }, 1000);
        });
    });
</script>
   
@endsection