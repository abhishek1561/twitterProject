<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>
        @if (isset($msg))
            {{$msg}}
        @endif
        <div class="container1">
            <form action="{{route('login')}}" method="post">
                @csrf
                <h1 class="logtwitter">Log in to Twitter</h1>
                <div class="inputbox">
                    <input type="text" name="login_field" placeholder="Phone, email or username" class="phone">
                    @error('login_field')
                    <span class="errormessage">{{ $message }}</span>
                @enderror
                </div>
                
                <div class="inputbox">
                    <input type="password" name="password" placeholder="Password" class="password">
                    @error('password')
                        <span class="errormessage">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputbox1">
                    <div class="submitbox">
                        <input type="submit" name="submit" value="Log in" class="logInBox">
                    </div>
                    <div class="remember">
                        <input type="checkbox" name="checkbox" id="checkBox"><label for="checkBox">&nbsp;&nbsp;Remember me&nbsp;.&nbsp;&nbsp;</label>
                        @error('checkbox')
                            <span class="errormessage">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="forgotpassdiv">
                        <a href="{{asset('forgotPassword')}}" class="forgotpassword">Forgot password?</a>
                    </div>
                </div>
            </form>
            <div class="newtwitter">New to Twitter? <a href="{{url('signup')}}" class="forgotpassword">Sign up now &rarr;</a></div>
        </div>
    </section>
</body>

</html>