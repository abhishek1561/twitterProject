<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Twitter Sign Up</title>
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="container1">
    <div class="logo_section">
        <div class="logo">
            <i class="fa-brands fa-twitter twitterimg"></i>
        </div>
    </div>
    
    @if(isset($success))
        {{$success}}
    @endif
    <h2 class="heading">Create your account</h2>
    <form method="post" action="{{route('signup')}}" class="Signup">
        @csrf

        {{-- -----Name Field Start----- --}}
        <label for="fullname">Name</label>
        <input type="text" id="textvalue" name="name" class="inputfield" oninput="count()">
        <div class="fullnamevalid">
            <div class="fullnameerror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <small class="errormessage">{{ $message }}</small>
                    </span>
                @enderror
            </div>
       
            <div class="count-word">
                <span id="textCount">0</span><span>/50</span>
            </div>
        </div>
        {{-- ----Name Field End---- --}}

        <div class="phonefield">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="inputfield" >
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <small class="errormessage">{{ $message }}</small>
                </span>
            @enderror
        </div>

        <div class="emailfield">
            <label for="email">Email</label>
        <input type="text" id="email" name="email" class="inputfield" >
        @error('email')
            <span class="invalid-feedback" role="alert">
                <small class="errormessage">{{ $message }}</small>
            </span>
        @enderror
        </div>

       <div class="passwordfield">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="inputfield" >
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <small class="errormessage">{{ $message }}</small>
                </span>
            @enderror
       </div>

        <input type="submit" name="submit" value="Next" class="topsubmitbutton">
       <a href="" class=" ues_email">Use email instead</a>
    </form>
</div>

<script src="{{asset('assets/js/custom.js')}}"></script>

</body>
</html>