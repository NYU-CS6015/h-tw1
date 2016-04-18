<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Tweet;

use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        if(Auth::check()) {
            $this->user_id = Auth::user()->id;
        }
    }

    public function index(User $user) {
        $tweets = Tweet::where('user_id',$this->user_id)->get();        
        // dd($tweets);
        $following = $user->following;
        $followers = $user->followers;        
        return view('users.user', ['following' => $following, 'followers' => $followers, 'tweets'=>$tweets])->withUser($user);
    }

    public function follow(Request $request, User $user) {                        
        $request->user()->following()->attach($user);        
        return redirect()->back();    	
    }

    public function unfollow(Request $request, User $user) {
        if($request->user()->alreadyFollows($user)) {
            $request->user()->following()->detach($user);    
        }    
        return redirect()->back();      
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

    public function search(Request $request) {
        $searchName = $request->username;
        $users = \DB::table('users')
                ->where('name', 'like', '%'.$searchName.'%')
                ->get();
        return  view('users.search', ['users'=>$users]);
        
    }
}
