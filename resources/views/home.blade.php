@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="twPc-div">
                <a class="twPc-bg twPc-block"></a>
                <div>
                    <a class="twPc-avatarLink">
                        <img src="https://avatars3.githubusercontent.com/u/8087061?v=3&s=96" class="twPc-avatarImg">
                    </a>
                    <div class="twPc-divUser">
                        <div class="twPc-divName">
                            <a href="{{route('user.index',$user)}}">{{$user->name}}</a>
                        </div>
                        <span>
                            @<span>{{$user->handle}}</span>
                        </span>
                    </div>
                    <div class="twPc-divStats">
                        <ul class="twPc-Arrange">
                            <li class="twPc-ArrangeSizeFit">
                                <a href="/user/{{Auth::user()->id}}">
                                    <span class="twPc-StatLabel twPc-block">Tweets</span>
                                    <span class="twPc-StatValue">{{$count}}</span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="/user/{{Auth::user()->id}}/following">
                                    <span class="twPc-StatLabel twPc-block">Following</span>
                                    <span class="twPc-StatValue">{{count($following)}}</span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="/user/{{Auth::user()->id}}/followers">
                                    <span class="twPc-StatLabel twPc-block">Followers</span>
                                    <span class="twPc-StatValue">{{count($followers)}}</span>
                                </a>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
            <br>
            <form method="POST" action="{{route('user.search')}}">
                {{csrf_field()}}
                <input type="text" class="form-control" placeholder="Search user" id="username" name="username">
                <br>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
                    <form method="POST" action="/create">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="Tweet">Tweet</label>
                            <textarea class="form-control" id="tweet" name="tweet"></textarea>
                            @if ($errors->has('tweet'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tweet') }}</strong>
                                </span>
                            @endif
                          </div>              
                        <button type="submit" class="btn btn-default"><i class="fa fa-twitter" aria-hidden="true"></i>  Tweet</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
                    @if($count>0)
                        <div class="panel panel-default">
                            <div class="panel-body">                        
                                @foreach ($tweets as $tweet)                                
                                    <b><a class="twitter-name" href="{{route('user.index', $tweet->user_id)}}">{{$tweet->name}}</a></b> <small>@<span>{{$tweet->handle}}</span> |
                                    <time class="timeago" datetime="{{$tweet->created_at}}">{{$tweet->created_at}}</time></small>
                                    <br>
                                    {{$tweet->tweet}} 
                                    <hr>
                                @endforeach                                                
                            </div>
                        </div>
                    @else
                        <div class="alert alert-success">
                            <p class="text-center">Announce your arrival!</p>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">                        
                                <b><a class="twitter-name" href="#">{{$user->name}}</a></b> <small>@<span>{{$user->handle}}</span></small>
                                <br>
                                <form method="POST" action="{{route('user.create.first.tweet')}}">
                                    {{ csrf_field() }}<br>
                                    <input type="hidden" id="tweet" name="tweet" value="Hello TweetBud">                
                                    Hello TweetBud!
                                    <button style="float:right"type="submit" class="btn btn-default"><i class="fa fa-twitter" aria-hidden="true"></i>  Tweet</button>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">                        
                                <b><a class="twitter-name" href="#">{{$user->name}}</a></b> <small>@<span>{{$user->handle}}</span></small>
                                <br>
                                <form method="POST" action="/create">
                                    {{ csrf_field() }}<br>                   
                                    <input type="hidden" id="tweet" name="tweet" value="My first tweet">                
                                    My first tweet!                                                                    
                                    <button style="float:right"type="submit" class="btn btn-default"><i class="fa fa-twitter" aria-hidden="true"></i>  Tweet</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>               
</div>
@endsection
