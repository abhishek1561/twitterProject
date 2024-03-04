<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>
        <div class="container">
            <div class="left">
                <div class="subbox"><a href="#"><i class="fa-solid fa-magnifying-glass"></i>&emsp;<span>Follow your
                            intrests.</span></a></div>
                <div class="subbox"><a href="#"><i class="fa-solid fa-user-group"></i>&emsp;<span>hear what people are
                            talking about.</span></a></div>
                <div class="subbox"><a href="#"><i class="fa-regular fa-comment"></i>&emsp;<span>Join the
                            conversation.</span></a></div>
            </div>
            <div class="right">
                <div class="formbox">
                    <div class="topbox">
                        <div class="topBox">
                            <i class="fa-brands fa-twitter twitterimg"></i>
                        </div>
                        <div class="topBox">
                            <a href="{{asset('login')}}" class="topbutton">Log in</a>
                        </div>
                    </div>
                    <p class="topcontent">See what's happening in the world right now</p>
                    <small class="joinTwitter">Join Twitter today.</small>
                    <div class="buttonbox">
                        <div class="buttonbox1">
                            <a href="{{asset('signup')}}" class="buttonsign">Sign Up</a>
                        </div>
                        <div class="buttonbox1">
                            <a href="{{asset('login')}}" class="buttonlog">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/fontawesome.min.js')}}"></script>
    <script src="https://example.com/fontawesome/v6.5.1/js/all.js" data-auto-a11y="true"></script>
</body>

</html>