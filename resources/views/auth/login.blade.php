<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PMS</title>
    <!-- imports -->
    <link rel="icon" href="{{ url('assets/images/favicon.ico')}}"  type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>

<style>
    html { height: 100%; }
    body {
        min-height: 100%;
        background: linear-gradient(180deg, rgba(30, 40, 61, 1) 12%, rgba(94, 142, 184, 1) 59%, rgba(35, 103, 160, 1) 100%);
        font-family: 'Poppins';
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<body>
    <div class="l-container">
        <div class="l-logo">
            <img src="{{ URL::to('assets/images/f-logo.png') }}" alt="Logo">
        </div>
        <div class="page-header">
            <h1>QuickTech <small>Payroll Management System - Admin Module</small></h1>
        </div>
        
        <div class="notification" id="notification"></div>
           
            <form action="{{route('login-user')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                
                    <input type="text" class="form-control" placeholder="Username" name="email" value="">
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                
                
                    <input type="password" class="form-control" placeholder="Password" name="password" value="">
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                
                    <label for="rememberMe">
                        <input type="checkbox" id="rememberMe" name="rememberMe"> Remember Me
                    </label>
                    <button type="submit" onclick="validateLogin()">Sign in <span class="icon-arrow-next icon-white"></span></button>
                    
            </form>
            
      
       <!-- <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div> -->
    </div>
</body>

</html>
