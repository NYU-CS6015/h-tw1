@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
            @if(!Auth::user())
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            @endif

            @foreach ($tweets as $tweet)
            <div class="panel panel-default">                
                <div class="panel-body">
                    {{$tweet}}
                    {{$tweet->tweet}}
                    {{$tweet->handle}}
                </div>
            </div>
            @endforeach 
            {{ $tweets->appends(Request::except('page'))->links()}}           
        </div>        
    </div>    
</div>
@endsection
