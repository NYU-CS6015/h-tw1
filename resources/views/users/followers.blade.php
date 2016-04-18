@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($followers) == 0)
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                <p class="text-center">No Followers!</p>
            </div>
        </div>
    @else
        <div class="row">    
            @foreach($followers as $user)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">          
                <div class="twPc-div">
                    <a class="twPc-bg twPc-block"></a>
                    <div>
                        <a title="{{Auth::user()->name}}" href="#" class="twPc-avatarLink">
                            <img alt="{{Auth::user()->name}}" src="https://avatars3.githubusercontent.com/u/8087061?v=3&s=96" class="twPc-avatarImg">
                        </a>
                        <div class="twPc-divUser">
                            <div class="twPc-divName">
                                <a href="/user/{{$user->id}}">{{$user->name}}</a>
                            </div>
                            <span>
                                @<span>{{$user->handle}}</span>
                            </span>
                        </div>
                    </div> 
                </div>                   
            </div>
            @endforeach
        </div>        
    @endif
</div>
@endsection
