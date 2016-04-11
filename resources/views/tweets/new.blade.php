@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
		<form method="POST" action="/create">
			{{ csrf_field() }}
			<div class="form-group">
			    <label for="Tweet">Tweet</label>
			    <textarea class="form-control" id="tweet" name="tweet">
			    </textarea>
			  </div>			  
  			<button type="submit" class="btn btn-default">Punch in!</button>
		</form>
	</div>
</div>
@endsection