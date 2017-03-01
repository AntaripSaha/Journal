@extends('layouts.main')

@section('content')
<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>{{ $article->title }}</h3>
			<hr>
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-body">
						<p>{{ $article->article }}</p>
						<hr>
						<a href="{{ url('/') }}" class="btn btn-link"><i class="fa fa-undo" aria-hidden="true"></i> Back to the Journal wall</a>
						<div class="pull-right">
							<a href="{{ route('articles.like', [$article->id, 1]) }}" class="btn btn-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
							<i>{{ $article->rating }}</i>
							<a href="{{ route('articles.like', [$article->id, 0]) }}" class="btn btn-danger"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>

				<h3>Add comment</h3>
											
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-1">
								<img src="http://placehold.it/48x48" alt="">
							</div>
							<div class="col-xs-11">
								@if(Auth::guest())
									<div class="form-group">
										<textarea disabled class="form-control comment-box" cols="30" rows="10" placeholder="Sign in to comment!"></textarea>
									</div>
									<div class="form-group">
										<input disabled type="submit" class="btn btn-primary" value="Add">
									</div>
								@else
									<form method="POST" action="{{ route('articles.comment', $article->id) }}">
										{{ csrf_field() }}
										<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
											<textarea class="form-control comment-box" cols="30" rows="10" name="comment" placeholder="Enter your text here...">{{ old('comment') }}</textarea>
											@if($errors->has('comment'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('comment') }}</strong>
				                                </span>
				                            @endif
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary" value="Add">
										</div>
									</form>
								@endif
							</div>
						</div>
					</div>
				</div>
					
				<h3>Comments: <i>{{$count}}</i></h3>

				@foreach($comments as $comment)
				@if($article->id == $comment->user_id)
				<div class="panel panel-success">
					<div class="panel-heading">
						<b>{{ $comment->user->username }}</b><i class="pull-right">{{ $comment->created_at }}</i>
					</div>
				@else
				<div class="panel panel-default">
					<div class="panel-heading">
						<b>{{ $comment->user->username }}</b><i class="pull-right">{{ $comment->created_at }}</i>
					</div>
				@endif
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-1">
								<img src="http://placehold.it/48x48" alt="">
							</div>
							<div class="col-xs-11">
								<p>
									{{ $comment->comment }}	
								</p>
								<hr>
								<button id="reply-{{$comment->id}}" onClick="reply({{$comment->id}})" class="btn btn-link" style="padding-left: 0;">Reply</button>
								
								@if(!Auth::guest() && Auth::user()->admin)
								<form method="POST" action="{{route('articles.comment.destroy', [$article->id, $comment->id])}}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</form>
								@endif

								<div class="clearfix" style="margin-bottom: 15px;"></div>
								<form id="answer-{{$comment->id}}" method="POST" action="{{ route('articles.comment.subcomment', [$article->id, $comment->id]) }}" hidden >
									{{ csrf_field() }}
									<div class="form-group">
										<textarea class="form-control comment-box" cols="30" rows="10" name="comment" placeholder="Enter your text here..."></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-success">Send</button>
									</div>
								</form>
								<div class="panel-group">
									@foreach($subcomments as $subcomment)
									@if($subcomment->comment_id == $comment->id)
									<!-- Sub comment -->
									@if($article->id == $subcomment->user_id)
									<div class="panel panel-success">
										<div class="panel-heading">
											<b>{{ $subcomment->user->username }}</b><i class="pull-right">{{ $subcomment->created_at }}</i>
										</div>
									@else
									<div class="panel panel-default">
										<div class="panel-heading">
											<b>{{ $subcomment->user->username }}</b><i class="pull-right">{{ $subcomment->created_at }}</i>
										</div>
									@endif
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-1">
													<img src="http://placehold.it/48x48" alt="">
												</div>
												<div class="col-xs-11">
													<p>
														{{ $subcomment->comment }}	
													</p>
													<hr>
													@if(!Auth::guest() && Auth::user()->admin)
													<form method="POST" action="{{route('articles.comment.subcomment.destroy', [$article->id, $subcomment->id])}}">
														{{ csrf_field() }}
														{{ method_field('DELETE') }}
														<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
													</form>
													@endif
												</div>
											</div>
										</div>
									</div>
									@endif
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<script>
	function reply(id) {
		console.log(id);
		$("#reply-"+id).hide();
		$("#answer-"+id).fadeIn('slow');
	}
</script>
@endsection