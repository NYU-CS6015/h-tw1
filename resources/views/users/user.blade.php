@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">        
        <div class="twPc-div">
            <a class="twPc-bg twPc-block"></a>            
            <div>
                @if(Auth::user()->id != $tweets[0]->user_id)
                    <div class="twPc-button">                    
                        <a class="btn btn-sm btn-primary" href="/follow/{{$tweets[0]->user_id}}">Follow</a>
                    </div>
                @endif
                <a class="twPc-avatarLink">
                    <img src="https://avatars3.githubusercontent.com/u/8087061?v=3&s=96" class="twPc-avatarImg">
                </a>
                <div class="twPc-divUser">
                    <div class="twPc-divName">
                        <span>{{$tweets[0]->name}}</span>
                    </div>
                    <span>
                        @<span>{{$tweets[0]->handle}}</span>
                    </span>
                </div>
                <div class="twPc-divStats">
                    <ul class="twPc-Arrange">
                        <li class="twPc-ArrangeSizeFit">
                            <a href="/user/{{$tweets[0]->user_id}}">
                                <span class="twPc-StatLabel twPc-block">Tweets</span>
                                <span class="twPc-StatValue">{{$tweetCount}}</span>
                            </a>
                        </li>
                        <li class="twPc-ArrangeSizeFit">
                            <a href="/user/{{$tweets[0]->user_id}}/following">
                                <span class="twPc-StatLabel twPc-block">Following</span>
                                <span class="twPc-StatValue">{{$following}}</span>
                            </a>
                        </li>
                        <li class="twPc-ArrangeSizeFit">
                            <a href="/user/{{$tweets[0]->user_id}}/followers">
                                <span class="twPc-StatLabel twPc-block">Followers</span>
                                <span class="twPc-StatValue">{{$followers}}</span>
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
                        @foreach ($tweets as $tweet)
                            <b>{{$tweet->name}}</b> <small>@<span>{{$tweet->handle}}</span> |
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
    @endsection
