@extends('layout.master')

@section('content')
	  @if(Storage::disk('local')->has(Auth::user()->name.'-'.Auth::user()->id.'.jpg'))
	 <div class="container-fluid">
	<section class="row">
		<div class="col-md-10 col-md-offset-1 fluid">
			<img src="{{route('account.image',['filename'=>Auth::user()->name.'-'.Auth::user()->id.'.jpg'])}}" alt="" style="max-height:300px;width:950px;" class="img-responsive center-block">
		</div>
	</section>
	</div>
	@endif
   



















     @include('include.message')
	<section class="row new-post">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>What do you have to say?</h3></header>
			<form action="{{route('createpost')}}" method="Post">
				<div class="form-group">
					<textarea  class="form-control" name="body" rows="5" placeholder="Your post">
						
					</textarea>
				</div>
				<button type="submit" class="btn btn-primary">Post</button>
				<input type="hidden" name="_token" value="{{Session::token()}}">
			</form>
		</div>
	</section>
	<section class="row posts">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>What other people say..</h3></header>
			@foreach($posts as $post)
			<article class="post">
				<input type="hidden" id="postid" value="{{$post->id}}">
				<p id="body">{{$post->body}}</p>
				<div class="info">
					Posted by {{$post->user->name}} on {{$post->created_at}}
				</div>
				<div class="interaction">
					<a href="#">Like</a>|
					<a href="#">Dislike</a>
				 @if(Auth::user() == $post->user)
				    |<a href="#" class="edit">Edit</a>|
					<a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>
				@endif
				</div>
			</article>
			@endforeach
		</div>
	</section>
    

    <div class="container">
  
  <!-- Trigger the modal with a button -->
 
  <!-- Modal -->
  <div class="modal fade" id="edit-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Post</h4>
        </div>
        <div class="modal-body">
          <form>
          	<div class="form-group">
          		<label for="post-body">Edit the post</label>
          		<textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
          	</div>
          	
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="modal-save">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
      
    </div>
  </div>
  
</div>
<script type="text/javascript">
	var token = '{{Session::token()}}';
	var url='{{route('edit')}}';
</script>
@endsection