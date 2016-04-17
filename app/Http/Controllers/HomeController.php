<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Tweet;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        if(Auth::check()) {
            $this->user_id = Auth::user()->id;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTweets = \DB::table('tweets')
            ->join('users', 'tweets.user_id', '=', 'users.id')
            ->orderBy('tweets.created_at','DESC')
            ->get();

        $myTweets = Tweet::where('user_id',$this->user_id)->orderBy('created_at','DESC')->get(); 
        $mytweetCount = $myTweets->count();

        $followers = \DB::table('follow_user')            
            ->where('follows_id',Auth::user()->id)
            ->get();  
        $followers = count($followers);

        $following = \DB::table('follow_user')            
            ->where('user_id',Auth::user()->id)
            ->get();  
        $following = count($following);
        
        return view('home', ['tweets' => $allTweets, 'tweetCount' => $mytweetCount, 'followers' => $followers, 'following' => $following]);        
    }
}
