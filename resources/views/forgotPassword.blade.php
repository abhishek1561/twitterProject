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
        <div class="container1">
            <form action="{{route('login')}}" method="post">
                @csrf
                <h1 class="logtwitter">Forgot Password</h1>
                <div class="inputbox">
                    <input type="text" name="phonenumber" placeholder="Phone, email or username" class="phone">
                </div>
                <div class="inputbox">
                    <input type="password" placeholder="Password" name="password" class="password">
                </div>
                <div class="inputbox">
                        <input type="submit" name="forgot" value="Submit" class="logInBox">
                </div>
            </form>
        </div>
    </section>
</body>

</html>