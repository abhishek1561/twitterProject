<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Retweet;
use Hash;
use Auth;
class UserController extends Controller
{
    public function create(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            return view('signup')->with('success', 'Your account has been created.');
        }else{
            return view('signup');
        }
    }

    public function username()
    {
        $loginField = request()->input('login_field');
        $fieldType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : (str_starts_with($loginField, '+') ? 'phone' : 'email');
        request()->merge([$fieldType => $loginField]);

        return $fieldType;
    }

    public function authenticate(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'login_field' => 'required',
                'password' => 'required',
                'checkbox'=>'required'
            ]);
            $credentials = $request->only($this->username(), 'password');
            // return $credentials;
            if(Auth::attempt($credentials))
            {
                // $request->session()->regenerate();
                return  redirect()->route('profile');
            }

            return view('login')->withMsg('Your provided credentials do not match our records.');
        }else{
            return view('login');
        }

    }

    public function userProfileEdit(Request $request){
        if($request->isMethod('post')){
            // return $request;
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->name = $request->name ? $request->name : $user->name;
            $user->email = $request->email ? $request->email : $user->email;
            $user->phone = $request->phone ? $request->phone : $user->phone;
            $user->password = $request->password ? Hash::make($request->password) : $user->password;
            $user->bio = $request->bio ? $request->bio :null;
            $user->dob = $request->dob ? $request->dob :null;
            $user->location = $request->location ? $request->location :null;
            if($request->profile){
                $imageName = time().'.'.$request->profile->extension();  
                $request->profile->move(public_path('images'), $imageName);
                $user->profile = $imageName;
            }
            if($request->header_pic){
                $imageHeader = time().'.'.$request->header_pic->extension();  
                $request->header_pic->move(public_path('images'), $imageHeader);
                $user->header_pic = $imageHeader;
            }
            $user->save();
            return back()->with('success', 'Your account has been created.');
        }else{
            $comment = Comment::all();
            $tweet = Retweet::count();
            $like = Like::count();
            return view('profile')->withComments($comment)->withTweet($tweet)->withLike($like);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
