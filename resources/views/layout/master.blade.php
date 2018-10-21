<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
         <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

     <!-- jQuery library -->
   
    <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/main.css')}}">

    </head>
    <body>
    	@include('include.header')
       <div class="container">
       		@yield('content')
       </div>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

   
    <!-- Latest compiled JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="{{URL::to('src/js/app.js')}}"></script>
    </body>
</html>
