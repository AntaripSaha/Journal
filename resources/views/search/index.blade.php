@extends('layouts.main')

@section('content')
<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Search results<span class="pull-right"><a href="{{ route('articles.create') }}" class="btn btn-success"><i class="fa fa-clipboard" aria-hidden="true"></i> Add</a></span></h3>
			<hr>
			<div class="panel-group">
				@if(!empty($articles))
					@foreach($articles as $article)
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title pull-left"><b><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></b></h3>								
								@if(!Auth::guest())
									@if(Auth::user()->admin)
									<div class="pull-right">
										<form method="POST" action="{{ route('articles.destroy', $article->id) }}">
											<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										</form>
									</div>
									@else
										@foreach(Auth::user()->articles as $userArticle)
											@if($userArticle->id == $article->id)
											<div class="pull-right">
												<form method="POST" action="{{ route('articles.destroy', $article->id) }}">
													<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
													{{ csrf_field() }}
													{{ method_field('DELETE') }}
													<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
												</form>
											</div>
											@endif
										@endforeach
									@endif
								@endif
								<div class="clearfix"></div>
							</div>
							<div class="panel-body">
								<p>{{ $article->introduction }}</p>
								<a href="{{ route('articles.show', $article->id) }}" class="btn btn-link pull-right">Read more</a>
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