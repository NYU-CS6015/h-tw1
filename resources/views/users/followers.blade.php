@extends('layouts.app')

@section('content')
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
@endsection
