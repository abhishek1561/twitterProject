@if(Auth::check())
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="headerbox headerbox1">
            <a href="#" class="headerlink"><i class="fa-solid fa-house-chimney-user"></i>&nbsp;Home</a>
            <a href="#" class="headerlink"><i class="fa-solid fa-bolt-lightning"></i>&nbsp;Moments</a>
            <a href="#" class="headerlink"><i class="fa-regular fa-bell"></i>&nbsp;Home</a>
            <a href="#" class="headerlink"><i class="fa-regular fa-envelope"></i>&nbsp;Moments</a>
            
        </div>
        <div class="headerbox">
            <i class="fa-brands fa-twitter twitterimg"></i>
        </div>
        <div class="headerbox">
            <div class="logoImg">
                <img src="{{asset('images/'.Auth::user()->profile)}}" alt="" class="ProfileLogoImg">
            </div>
            <div class="logoButton">
                <a href="{{route('logout')}}" class="logoutbutton headerlink">Logout</a>
            </div>
        </div>
    </header>
    @if(isset($success))
        {{$success}}
    @endif
    <section class="secsecond">
        <section class="profileBannerBox">

            <!-- ==================== Banner Img Start =========================== -->
            <img src="{{asset('images/'.Auth::user()->header_pic)}}" alt="" class="profileBannerImg">
            <!-- ==================== Banner Img End ========================= -->
            <div class="logoImgBox">
                <img src="{{asset('images/'.Auth::user()->profile)}}" alt="" class="ProfileLogoImg">
            </div>
        </section>
    </section>
    <form action="{{route('profile')}}" id="profileIdit" class="profileIdit" method="post" enctype="multipart/form-data"
        class="ProfileboxFile">
        <!-- =============================================== -->
        <section class="profileBannerBox">
            @csrf
            <!-- ==================== Banner Img Start =========================== -->
            <label for="proBannerimg"><img src="{{asset('images/'.Auth::user()->header_pic)}}" alt="" class="profileBannerImg"></label>
            <input type="file" id="proBannerimg" name="header_pic" style="display:none">
            <!-- ==================== Banner Img End ========================= -->

            <div class="logoImgBox">
                <img src="{{asset('images/'.Auth::user()->profile)}}" alt="" onclick="logoShow()" class="ProfileLogoImg">

                <!-- ============ Logo Img Start =========== -->
                <div id="logoIditimg" class="logoIditimg">
                    <ul class="logoiditoption">
                        <label for="uploadlogoimg">
                            <li>Upload photo</li>
                        </label>
                        <input type="file" name="profile" id="uploadlogoimg" style="display:none">
                        <li>Remove</li>
                        <li onclick="cancelbutton()">cancel</li>
                    </ul>
                </div>
                <!-- ============= Logo Img End ============== -->

            </div>
        </section>
        <!-- =================================================== -->


        <!-- ----Form Start -->
        <div id="boxForm" class="boxForm">
            <input type="text" value="{{Auth::user()->name}}" name="name" id="name" placeholder="Full Name">
            <input type="text" name="bio" value="{{Auth::user()->bio}}" placeholder="Bio">
            <input type="text" name="location" value="{{Auth::user()->location}}" placeholder="Location">
            <input type="date" name="dob" placeholder="Birthday">
        </div>
        <!-- ----Form End -->
        <input type="submit" name="submit" value="submit" class="saveProfile" onclick="saveProfile()">
    </form>
    <button id="cancelButton1" onclick="cancelButton()" class="cancelButton">Cancel</button>
    <button onclick="iditprofileShow();" id="IditprofileButton" class="IditprofileButton">Idit Profile</button>
    <section class="sec-header">

    </section>
    <section class="card">
        <div class="userProfile">
            <h1 class="username">{{Auth::user()->name}}</h1>
            <p class="userBio">{{Auth::user()->bio}}</p>
            <h3 class="userLocation">{{Auth::user()->location}}</h3>
            <h3 class="userBirthday">{{Auth::user()->dob}}</h3>
            <h4 class="userJoinedTime">{{Auth::user()->created_at}}</h4>
        </div>
        {{-- ===============User Views Cards Start=============== --}}
        <div class="userCard">
            <div class="userCardheader">
                <span class="userCardName">Tweets</span>
                <span class="userCardReplyName">Tweets & Replies</span>
            </div>
            <div class="userView">
                <div class="userViewLogo">
                    <img src="{{asset('images/'.Auth::user()->profile)}}" class="userViewLogoimg" alt="">
                </div>
                <div class="userViewName">
                    <h3 class="userview_UploadName">{{Auth::user()->name}}&nbsp;&nbsp;</h3><span class="userview_UploadTime">2h</span>
                    <p class="userviewComment">just setting my twitter</p>
                </div>
            </div>
            <div class="userviewpostItem">
                <img src="{{asset('images/'.Auth::user()->header_pic)}}" class="userpostItem" alt="">
            </div>
            <div class="userExpretion">
            <a href="{{route('comments.store')}}" style="color:black"><i class="fa-regular fa-comment"></i></a>
           
            <i class="fa-regular fa-heart heartcolor" id="heartcolor" onclick="heartcolor()"></i>
            <i class="fa-solid fa-heart heartcolorfull" id="heartcolorfull" onclick="heartcolorfull()"></i>
            <i class="fa-solid fa-retweet"></i>
            </div>
            @if(isset($comments))
        @foreach ($comments as $comment)
            <div class="commenters">
                <p>{{ $comment->body }}</p>
                @if ($comment->image)
                    <img src="{{ asset('storage/' . $comment->image) }}" height="100" width="100" alt="Comment Image">
                @endif
                @if ($comment->video)
                    <video controls>
                        <source src="{{ asset('storage/' . $comment->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
                <div class="userscomments">
                    <form action="{{ route('comments.like', $comment->id) }}" method="POST">
                        @csrf
                        {{-- {{isset($like) ? $like : ''}} --}}
                        <button type="submit" class="heartlikecomment"><i class="fa-solid fa-heart commentheartcolor"></i></button>
                    </form>
                </div>
                <div class="usersrecomments">
                    <form action="{{ route('comments.retweet', $comment->id) }}" method="POST">
                        @csrf
                        
                        <button type="submit" class="replycomment">Retweet</button>
                        {{-- {{isset($tweet)?$tweet : ''}} --}}
                    </form>
                </div>
            </div>
        @endforeach
        @endif
        </div>
        {{-- ==============User Views Card End===================== --}}

        <div class="userFollower"></div>
    </section>











    <script src="{{asset('assets/js/jqueryProfile.js')}}"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
    // ==========Idit Profile ========
    function iditprofileShow() {

        document.getElementById("IditprofileButton").style.display = "none";
        document.getElementById("cancelButton1").style.display = "block";
        document.getElementById("profileIdit").style.display = "block";
    }

    function cancelButton() {
        document.getElementById("profileIdit").style.display = "none";
        document.getElementById("IditprofileButton").style.display = "block";
        document.getElementById("cancelButton1").style.display = "none";
        document.getElementById("logoIditimg").style.display = "none";
    }
    // ===========================================Save Profile 
    function saveProfile() {
        document.getElementById("profileIdit").Submit();
    }
    // ========================
    function logoShow() {
        document.getElementById("logoIditimg").style.display = "block";
    }

    function cancelbutton() {
        document.getElementById("logoIditimg").style.display = "none";
    }
    function heartcolor(){
        document.getElementById("heartcolorfull").style.display = "block";
        document.getElementById("heartcolor").style.display="none";
    }
    function heartcolorfull(){
        document.getElementById("heartcolor").style.display="block";
        document.getElementById("heartcolorfull").style.display="none";
    }
    </script>
</body>

</html>
@endif