@extends('layouts.main')

@section('content')
<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Guest book</h3>
			<hr>
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="{{ route('guestbook') }}" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									<label for="name">Name *</label>
									<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
									@if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail">
									@if($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group{{ $errors->has('feedback') ? ' has-error' : '' }}">
									<label for="feedback">Your text</label>
									<textarea name="feedback" class="form-control comment-box" id="" cols="30" rows="10" placeholder="Your text here...">{{ old('feedback') }}</textarea>
									@if($errors->has('feedback'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('feedback') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<button class="btn btn-success">Add</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="panel-group">
				@foreach($feedbacks as $feedback)
				<div class="panel panel-default">
					<div class="panel-heading">
						<b>{{ $feedback->name }}</b>
					</div>
					<div class="panel-body">
						{{ $feedback->message }}<div class="pull-right"><a href="mailto:{{ $feedback->email }}" class="btn btn-link">E-mail</a></div>
					</div>
					<div class="clearfix"></div>
				</div>
				@if(!$loop->last)
				<br>
				@endif
				@endforeach			
			</div>
		</div>
	</div>
</div>
@endsection

@section('sidebar')
@include('layouts.includes.sidebar')
@endsection