@extends('layouts.main')

@section('content')
<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Journal wall <span class="pull-right"><a href="{{ url('/article/add') }}" class="btn btn-success"><i class="fa fa-clipboard" aria-hidden="true"></i> Add</a></span></h3>
			<hr>
			<div class="panel-group">
				@if(!empty($articles))
					@foreach($articles as $article)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title pull-left"><b><a href="{{ url('articles/'.$article->id) }}">{{ $article->title }}</a></b></h3>
							@if(!Auth::guest() && Auth::user()->admin)
							<div class="pull-right">
								<a href="edit.news.html" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="{{ url('/article/delete/'.$article->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</div>
							@endif
							<div class="clearfix"></div>
						</div>
						<div class="panel-body">
							<p>{{ $article->introduction }}</p>
							<a href="{{ url('articles/'.$article->id) }}" class="btn btn-link pull-right">Read more</a>
						</div>
					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</div>
@endsection

@section('sidebar')
@include('layouts.includes.sidebar')
@endsection