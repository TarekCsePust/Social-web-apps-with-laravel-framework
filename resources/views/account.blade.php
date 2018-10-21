@extends('layout.master')

@section('title')
	Account
@endsection


@section('content')
<section class="row">
	<div class="col-md-6 col-md-offset-3">
		<header><h3>Your Account</h3></header>
		<form action="{{route('updateaccount')}}" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control" value="{{$user->name}}" required>
			</div>
			<div class="form-group">
				<label for="image">Image (only .jpg)</label>
				<input type="file" name="image" class="form-control" id="image">
			</div>
			<button type="submit" class="btn btn-primary">Save account</button>
			<input type="hidden" name="_token" value="{{Session::token()}}">
		</form>
	</div>
</section>
	@if(Storage::disk('local')->has($user->name.'-'.$user->id.'.jpg'))
	<section class="row">
		<div class="col-md-6 col-md-offset-3">
			<img src="{{route('account.image',['filename'=>$user->name.'-'.$user->id.'.jpg'])}}" alt="" class="img-responsive">
		</div>
	</section>
	@endif
@endsection