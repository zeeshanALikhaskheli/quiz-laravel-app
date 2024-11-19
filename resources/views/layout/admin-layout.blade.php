<!doctype html>
<html lang="en">
  <head>
  	<title>Quiz - online examination system</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('logo.png')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{asset('js/multiselect-dropdown.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
      .multiselect-dropdown{
        width: 100% !important;
      }
    </style>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">QUIZ - online examination system</span>
	        </button>
        </div>
        
        <img src="{{asset('logo.png')}}" alt="" width="100%">
        <h1><a href="/admin/dashboard" class="logo">Dashboard</a></h1>
        <ul class="list-unstyled components mb-5">
          <li >
            <a href="/admin/dashboard"><span class="fa fa-sticky-note mr-3"></span> Subjects</a>
          </li>
          <li >
            <a href="/admin/exam"><span class="fa fa-tasks mr-3"></span> Exams</a>
          </li>
       
         
          <li>
            <a href="/admin/quiz"><span class="fa fa-question-circle mr-3"></span> Quiz ( Q&A )</a>
          </li>
          <li>
            <a href="/admin/Students"><span class="fa fa-graduation-cap mr-3"></span> Students</a>
          </li>
          <li>
          <li>
            <a href="/admin/calender"><span class="fa fa-calendar mr-3"></span> Events</a>
          </li>
          <li>
            <a href="{{route('form-builder.index')}}"><span class="fa fa-book mr-3"></span> Survey's</a>
          </li>
          <li>
            <a href="/logout"><span class="fa fa-sign-out mr-3"></span> logout</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        @yield('home-content')

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Survey's  </a>
      </nav>

      
      <div class="py-4">
          @yield('content')
      </div>
        
      </div>
		</div>

    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>