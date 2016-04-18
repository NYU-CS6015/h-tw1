<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'handle'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tweets() {
        return $this->hasMany('App\Tweet')->orderBy('created_at','DESC');
    }

    public function isThisMe(User $user) {
        return $user->id == Auth::user()->id;
    }
    
    public function alreadyFollows(User $user) {        
        return $this->isFollowing($user);
    }

    public function isFollowing(User $user) {
        return (bool) $this->following->where('id', $user->id)->count();
    }

    public function following() {
        return $this->belongsToMany('App\User', 'follow_user', 'user_id', 'follows_id');
    }

    public function followers() {
        return $this->belongsToMany('App\User', 'follow_user', 'follows_id', 'user_id');
    }
}
