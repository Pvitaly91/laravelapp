<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <scrip src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></scrip>
    <scrip src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></scrip>
</head>
<body id="admin-page">
     <div id="wrapper">
         <nav class="navbar navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                 <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <a href="/" class="navbar-brand">Home</a>
             </div>
                <!----------------------->
             <!--<ul class="nav navbar-top-links navbar-right">
                <!---drobdown------>
             <!--   <li class="dropdown">
                    <a class="dropdown-togle" data-toggle="dropdown" href="#">f
                       <i class="fa fa-user fa-fw"></i>
                        <i class="fa fa-caret-down"></i>
                    </a>
                </li>
            </ul>-->
         </nav>
     </div>


     <div id="page-wrapper">
         <div class="container-fluid">
             <div class="row">
                 <div class="col0lg012">
                     <h1 class="page-header">
                         text
                     </h1>@yield('content')
                 </div>
             </div>
         </div>
     </div>
     <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
     <script src="{{asset('js/script.js')}}"></script>



    @yield('footer')
</body>
</html>