@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
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
  			<button type="submit" class="btn btn-default">Punch in!</button>
		</form>
	</div>
</div>
@endsection