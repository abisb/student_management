<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>{{ isset($title)? $title : config('app.name','Fresh Supermarket')}}</title>
  </head>
  <body>


  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




<!------ Include the above in your HEAD tag ---------->

    
<div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
         
            <li class="nav-item">
                <a class="nav-link" href="{{ url('students_list') }}">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('students_mark') }}">Marks</a>
            </li>
            
    
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</div>
    <!-- END header -->
  
        @yield('content')    
        @yield('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</html>