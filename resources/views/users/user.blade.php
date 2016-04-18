@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="twPc-div">
                <a class="twPc-bg twPc-block"></a>
                <div>
                    @if(!Auth::user()->isThisMe($user))
                        @if(!Auth::user()->isFollowing($user))
                            <div class="twPc-button">                    
                                <a class="btn btn-sm btn-primary" href="{{ route('user.follow', $user) }}">Follow</a>
                            </div>
                        @else
                            <div class="twPc-button">                    
                                <a class="btn btn-sm btn-primary" href="{{ route('user.unfollow', $user) }}">Unfollow</a>
                            </div>
                        @endif
                    @endif
                    <a class="twPc-avatarLink">
                        <img src="https://avatars3.githubusercontent.com/u/8087061?v=3&s=96" class="twPc-avatarImg">
                    </a>
                    <div class="twPc-divUser">
                        <div class="twPc-divName">
                            <span>{{$user->name}}</span>
                        </div>
                        <span>
                            @<span>{{$user->handle}}</span>
                        </span>
                    </div>
                    <div class="twPc-divStats">
                        <ul class="twPc-Arrange">
                            <li class="twPc-ArrangeSizeFit">
                                <a href="#">
                                    <span class="twPc-StatLabel twPc-block">Tweets</span>
                                    <span class="twPc-StatValue">{{count($user->tweets)}}</span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="#">
                                    <span class="twPc-StatLabel twPc-block">Following</span>
                                    <span class="twPc-StatValue">{{count($user->following)}}</span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="#">
                                    <span class="twPc-StatLabel twPc-block">Followers</span>
                                    <span class="twPc-StatValue">{{count($user->followers)}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>                
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">        
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
                    <div class="panel panel-default">                
                        <div class="panel-body">
                            @foreach ($user->tweets as $tweet)
                                <b>{{$user->name}}</b> <small>@<span>{{$user->handle}}</span> |
                                <time class="timeago" datetime="{{$tweet->created_at}}">{{$tweet->created_at}}</time></small>
                                <br>
                                {{$tweet->tweet}} 
                                <hr>
                            @endforeach                        
                        </div>
                    </div>
                </div>
            </div>                    
        </div>
    </div>
</div>

@endsection
