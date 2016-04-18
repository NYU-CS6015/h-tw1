<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use Auth;

class ProfileController extends Controller
{
    public function __construct(User $user) {
    	$this->following = count($user->following()->get());
    	$this->followers = count($user->followers()->get());
    }

    public function index(User $user) {    	
    	return view('profile.index',['following'=>$this->following,'followers'=>$this->followers,'user'=>$user]);
    }

    public function create(User $user) {
    	return view('profile.create',['following'=>$this->following,'followers'=>$this->followers, 'user'=>$user]);
    }

    public function store(Request $request,User $user) {
    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'handle' => 'required|min:3|max:15'
        ]);	        	

        if ($validator->fails()) {
            return redirect(route('user.edit.profile',$user))->withInput()->withErrors($validator);
        }

		$profile = User::find(Auth::user()->id);
        $profile->name = $request->name;
        $profile->handle = $request->handle;   
        $profile->location = $request->location;        
        $profile->save();

        return redirect(route('user.profile',$user));
    }
}
