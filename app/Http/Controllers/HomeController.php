<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Tweet;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        if(Auth::check()) {
            $this->user = Auth::user();
        }
    }

    public function index(Request $request) {        
        if(count(Auth::user()->following()->get())!=0) {            
            $tweets = User::join('tweets','users.id','=','tweets.user_id')
                        ->whereIn('tweets.user_id',$request->user()->following()->lists('users.id')->push($this->user->id))
                        ->orderBy('tweets.created_at', 'desc')
                        ->get();            
            $tweetCount = count(Tweet::with('users')->where('user_id','=',$this->user->id)->get());        
            $following = $this->user->following;
            $followers = $this->user->followers;            
            return view('home', ['tweets' => $tweets, 'count'=>$tweetCount, 'user'=>$this->user, 'following'=>$following,'followers'=>$followers]);
        } else {
            $tweets = User::join('tweets','users.id','=','tweets.user_id')->where('tweets.user_id','=',$this->user->id)->orderBy('tweets.created_at','DESC')->get();                        
            $tweetCount = count($tweets);
            $following = $this->user->following;
            $followers = $this->user->followers;    
            return view('home', ['tweets' => $tweets, 'count'=> $tweetCount, 'user'=>$this->user, 'following'=>$following,'followers'=>$followers]);
        }
        
    }
}
