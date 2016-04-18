<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tweet;

use App\User;

use Auth;

use Illuminate\Support\Facades\Validator;

class TweetController extends Controller
{
    public function __construct() {
		$this->middleware('auth');
		if(Auth::check()) {
			$this->user_id = Auth::user()->id;			
		}
	}

	public function index() {		        		
		$tweets = User::with('tweets')->orderby('tweets.created_at','DESC')->get();
		return view('home', ['tweets' => $tweets]);
	}

	public function create() {		        				
		return view('tweets.new');
	}

	public function store(Request $request) {		
		$validator = Validator::make($request->all(), [
            'tweet' => 'required|max:140',
        ]);	        				
        if ($validator->fails()) {
            return redirect('/home')->withInput()->withErrors($validator);
        }

		$tweet = new Tweet;
        $tweet->tweet = $request->tweet;
        $tweet->user_id = Auth::user()->id;        
        $tweet->save();

        return redirect(route('user.index',$this->user_id));
	}
}
