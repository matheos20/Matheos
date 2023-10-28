@include('header')
<link rel="stylesheet" href="{{asset('css/login.css')}}" type="text/css"> 

@section("title", "Créer un client")
    <style>
        input, select {
            border: 1px solid !important;
            border-radius: 15px !important;
            padding: 10px 10px !important;
        }
    </style>
    <div class="container">
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
            <img src="assets/img/avataaars.svg" id="icon" alt="User Icon" />
            </div>
            <!-- Login Form -->
            <form method="POST" class=" mt-5" action="{{ route('auth.auth') }}" autocomplete="off">
                @csrf
                @if (session('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif

                <input type="text" id="login" class="fadeIn second" name="email" placeholder="login" autocomplete="off">
                @error("email")
                    <div style="color:red;">{{ $message }}</div>
                @enderror
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" autocomplete="off">
                @error("password")
                    <div style="color:red;">{{ $message }}</div>
                @enderror
                <input type="submit" class="btn btn-primary mt-4 mb-4" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
        </div>
    </div>

@include('footer')
