<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="commentdiv">
        <div class="container2">
            <form action="{{ route('comments.store') }}" method="POST" class="commentform" enctype="multipart/form-data">
                @csrf
                <div class="commentcontent">
                    <textarea name="body" class="commentcontenttext" placeholder="Write your comment here"></textarea>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                        <small class="errormessage">{{ $message }}</small>
                    </span>
                @enderror
                </div>
                <div class="commentimage">
                    <input type="file" class="commentimagefield" placeholder="Enter image" name="image">
                </div>
                <div class="commentvideo">
                    <input type="file" class="commentvideofield" placeholder="Enter Video" name="video">
                </div>
                <div class="commentsubmitbutton">
                    <button type="submit" class="commentbuttonsubmit">Post Comment</button>
                </div>
            </form>
            
        </div>
    </section>
</body>
</html>