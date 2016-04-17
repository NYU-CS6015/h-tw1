@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="twPc-div">
            <a class="twPc-bg twPc-block"></a>
            <div>
                <a title="{{Auth::user()->name}}" class="twPc-avatarLink">
                    <img alt="{{Auth::user()->name}}" src="https://avatars3.githubusercontent.com/u/8087061?v=3&s=96" class="twPc-avatarImg">
                </a>
                <div class="twPc-divUser">
                    <div class="twPc-divName">
                        <a href="/user/{{Auth::user()->id}}">{{Auth::user()->name}}</a>
                    </div>
                    <span>
                        @<span>{{Auth::user()->handle}}</span>
                    </span>
                </div>
                <div class="twPc-divStats">
                    <ul class="twPc-Arrange">
                        <li class="twPc-ArrangeSizeFit">
                            <a href="/user/{{Auth::user()->id}}">
                                <span class="twPc-StatLabel twPc-block">Tweets</span>
                                <span class="twPc-StatValue">{{$tweetCount}}</span>
                            </a>
                        </li>
                        <li class="twPc-ArrangeSizeFit">
                            <a href="/user/{{Auth::user()->id}}/following">
                                <span class="twPc-StatLabel twPc-block">Following</span>
                                <span class="twPc-StatValue">{{$following}}</span>
                            </a>
                        </li>
                        <li class="twPc-ArrangeSizeFit">
                            <a href="/user/{{Auth::user()->id}}/followers">
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
                <div class="panel panel-default">                
                    <div class="panel-body">
                        @foreach ($tweets as $tweet)
                            <b><a class="twitter-name" href="/user/{{$tweet->user_id}}">{{$tweet->name}}</a></b> <small>@<span>{{$tweet->handle}}</span> |
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
