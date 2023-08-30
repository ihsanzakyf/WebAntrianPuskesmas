<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico"> --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">
    {{-- <link rel="icon" type="image/png" sizes="48x48" href="{{asset('images/medical.png')}}"> --}}
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Title -->
    <title>Puskesmas Ihsan | Login</title>
    <style>
        .hoper{
            font-size: 17px;
            position: relative;
            cursor: pointer;
            margin-left: 80rem;
            margin-top: 20px;
            text-decoration: none;
        }
        .hoper::after{
            content: "";
            position: absolute;
            bottom: -1px;
            height: 3px;
            width: 100%;
            left: 0;
            background-color: black;
            text-decoration: none;
            transition: 0.3s;
            transition-timing-function: ease-in-out;
            transform: scaleX(0);
        }
        .hoper:hover::after{
            transform: scaleX(1);
            background-color: black;
            text-decoration: none;
        }
    </style>
</head>
@if ($logerr = Session::get('logerr'))
<div class="alert alert-danger col-auto" data-bs-toggle="alert">
    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
    {{ $logerr }}
</div>
@elseif ($okin = Session::get('okin'))
<div class="alert alert-success col-auto" data-bs-toggle="alert">
    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
    {{ $okin }}
</div>
@endif
<body class="text-center">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-md d-flex">
          <a class="navbar-brand hoper" href="/">Home</a>
        </div>
    </nav>
    <form class="form-signin" method="POST" action="">
        @csrf
        <img class="mb-4" src="{{ asset('images/medical.png') }}" style="margin-top: 10rem;" alt="foto" width="150" height="">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus="">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button><br>
        <a href="/register">Belum Punya Akun ? Register</a><br>
        <?php echo " © " . (int)date('Y') . " Ihsan Zaky Fadillah"; ?>
    </form>
</body>

</html>
