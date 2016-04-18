@extends('layouts.app')

@section('content')
<div class="container">		
	<div class="row">
		<div class="col-lg-2 col-md-2">	
		<center>
			<img src="https://avatars3.githubusercontent.com/u/8087061?v=3&s=96" class="twPc-avatarImg">	
		</center><br>
		</div>
		<div class="col-lg-10 col-md-10">
			<form class="form-horizontal" role="form" method="POST" action="{{route('user.save.profile',$user)}}">
				{{csrf_field()}}
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Name:</label>
					<div class="col-sm-10">
						<input type="text" value="{{$user->name}}" class="form-control" id="name" name="name" placeholder="Full name">
						@if ($errors->has('name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
	                    @endif
					</div>					
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="handle">Handle:</label>
					<div class="col-sm-10"> 
						<input type="text" value="{{$user->handle}}" class="form-control" id="handle" name="handle" placeholder="Twitter Handle">
						@if ($errors->has('handle'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('handle') }}</strong>
	                        </span>
	                    @endif
					</div>					
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="location">Location:</label>
					<div class="col-sm-10"> 
						<input type="text" value="{{$user->location}}" class="form-control" id="location" name="location" placeholder="Location">
						@if ($errors->has('location'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('location') }}</strong>
	                        </span>
	                    @endif
					</div>					
				</div>				
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Save Profile</button>
					</div>
				</div>
		</form>
		</div>
	</div>
</div>
@endsection