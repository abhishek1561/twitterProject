<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Retweet;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'body' => 'required',
            ]);

            $comment = new Comment();
            $comment->user_id = Auth::id();
            $comment->body = $request->body;

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('comment_images');
                $comment->image = $imagePath;
            }

            // Handle video upload
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('comment_videos');
                $comment->video = $videoPath;
            }

            $comment->save();

            return redirect()->route('profile');
        }else{
            return view('comment');
        }
    }

    public function like($id)
    {
        $like = new Like();
        $like->user_id = Auth::id();
        $like->comment_id = $id;
        $like->save();

        return back()->with('success', 'Comment liked!');
    }

    public function retweet($id)
    {
        $retweet = new Retweet();
        $retweet->user_id = Auth::id();
        $retweet->comment_id = $id;
        $retweet->save();

        return back()->with('success', 'Comment retweeted!');
    }

    public function getComment(){
       $comment =  Comment::all();
       return redirect()->route('profile')->withComments($comment);
    }
}
