@extends('layouts.app')

@section('content')
<div class="container">		
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">		
				<center>
					<img src="https://avatars3.githubusercontent.com/u/8087061?v=3&s=96" class="twPc-avatarImg">
					<br><b>{{$user->name}}<br></b>					
				</center>
				<center>
					<b>@<span>{{$user->handle}}</span></b><br>
					<br><b>{{$user->location}}<br></b>					
					<b>Following</b>: {{$following}} | <b>Followers</b>: {{$followers}}<br><br>
					<a class="btn btn-primary" href="{{route('user.edit.profile',$user)}}">Edit Profile</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection