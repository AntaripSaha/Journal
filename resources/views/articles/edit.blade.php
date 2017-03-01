@extends('layouts.main')

@section('content')
<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Article editing</h3>
			<hr>
			<div class="panel panel-default">
				<div class="panel-body">
					<form method="POST" action="{{ route('articles.update', $article->id) }}">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title">Title *</label>
							<input type="text" class="form-control" name="title" value="{{ old('title', $article->title) }}" placeholder="Title">
							@if($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
							<label for="introduction">Introduction *</label>
							<textarea class="form-control comment-box" name="introduction" id="" cols="30" rows="10" placeholder="The introduction which will be seen on the Journal wall">{{ old('introduction', $article->introduction) }}</textarea>
							@if($errors->has('introduction'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('introduction') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
							<label for="tags">Tags</label>
							<textarea class="form-control comment-box" name="tags" id="" cols="30" rows="10" placeholder="Your tags should look like: #today #is #a #good #day">{{ old('tags', $article->tags) }}</textarea>
							@if($errors->has('tags'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group{{ $errors->has('article') ? ' has-error' : '' }}">
							<label for="article">Article *</label>
							<textarea class="form-control" name="article" id="" cols="30" rows="10" placeholder="Your article here">{{ old('article', $article->article) }}</textarea>
							@if($errors->has('article'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('article') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group">
							<button class="btn btn-success">Save changes</button>
							<a href="{{ route('articles.index') }}" class="btn btn-danger">Cancel, back to the wall</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection