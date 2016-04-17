<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Tweet;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        if(Auth::check()) {
            $this->user_id = Auth::user()->id;
        }
    }

    public function show($id) {
    	$tweets = \DB::table('tweets')
            ->join('users', 'tweets.user_id', '=', 'users.id')
            ->where('users.id','=', $id)
            ->orderBy('tweets.created_at','DESC')
            ->get();    	        
        $tweetCount = count($tweets); 

        $followers = \DB::table('follow_user')            
            ->where('follows_id',$id)
            ->get();  
        $followers = count($followers);

        $following = \DB::table('follow_user')            
            ->where('user_id',$id)
            ->get();  
        $following = count($following);  

        return view('users.user', ['tweets' => $tweets, 
        						   'tweetCount' => $tweetCount,
        						   'followers' => $followers,
        						   'following' => $following
        						   ]);        
    }

    public function follow($id) {
    	\DB::insert('insert into follow_user (user_id, follows_id) values (?, ?)', [Auth::user()->id,$id]);
    	$tweets = \DB::table('tweets')
            ->join('users', 'tweets.user_id', '=', 'users.id')
            ->where('users.id','=', $id)
            ->orderBy('tweets.created_at','DESC')
            ->get();    	        
        $tweetCount = count($tweets); 
        $followers = \DB::table('follow_user')            
            ->where('follows_id',Auth::user()->id)
            ->get();  
        $followers = count($followers);

        $following = \DB::table('follow_user')            
            ->where('user_id',Auth::user()->id)
            ->get();  
        $following = count($following);                 
    	return view('users.user', ['tweets' => $tweets, 
        						   'tweetCount' => $tweetCount,
        						   'followers' => $followers,
        						   'following' => $following
        						   ]);
    }

    public function getFollowing($id) {
    	$following = \DB::table('follow_user')
            ->join('users', 'follow_user.follows_id', '=', 'users.id')
            ->where('follow_user.user_id','=', $id)            
            ->get();        
        return view('users.following', ['following' => $following]);
    }

    public function getFollowers($id) {
    	$followers = \DB::table('follow_user')
            ->join('users', 'follow_user.user_id', '=', 'users.id')
            ->where('follow_user.follows_id','=', $id)            
            ->get();        
        return view('users.followers', ['followers' => $followers]);
    }
}
