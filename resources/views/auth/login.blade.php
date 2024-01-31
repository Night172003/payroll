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
            <h1>QuickTech <small>Payroll Management System -Login</small></h1>
        </div>
        
                <div class="notification" id="notification">
            @if(Session::has('showPopup') && Session::get('showPopup'))
                <!-- Display pop-up for invalid credentials using JavaScript -->
                <div class="alert alert-danger">
                    Invalid credentials. Please try again.
                </div>
            @endif
        </div>
           
        <form action="{{ route('login-user') }}" method="post" onsubmit="return validateForm()">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf

            <input type="text" class="form-control" placeholder="Username" name="email" id="email" value="">
            <span class="text-danger" id="email-error"></span>

            <input type="password" class="form-control" placeholder="Password" name="password" value="">
            <span class="text-danger">@error('password') {{ $message }} @enderror</span>

            <label for="rememberMe">
                <input type="checkbox" id="rememberMe" name="rememberMe"> Remember Me
            </label>

            <button type="submit">Sign in <span class="icon-arrow-next icon-white"></span></button>
        </form>
    </div>
    

<!-- Your existing HTML content -->

<script>
    // Optional: You can use JavaScript to automatically close the alert after a certain time
    setTimeout(function() {
        document.querySelector('.alert').style.display = 'none';
    }, 5000); // Adjust the time as needed (5000 milliseconds = 5 seconds)
</script>
</body>

</html>
