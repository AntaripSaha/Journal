@extends('layouts.main')

@section('content')
<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Journal</h3>
			<hr>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-3">
							<div class="input-group">
								<span class="input-group-addon"><b>ID</b></span>
								<input type="text" class="form-control" value="{{ $user->id }}" disabled>
							</div>
						</div>
						<div class="col-xs-9">
							<div class="input-group">
								<span class="input-group-addon"><b>Username</b></span>
								<input type="text" class="form-control" value="{{ $user->username }}" disabled>
							</div>
						</div>
					</div>
					<hr>
					<form action="{{ route('profile') }}" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group input-group{{ $errors->has('name') ? ' has-error' : '' }}">
									<span class="input-group-addon"><b>Name</b></span>
									<input type="text" class="form-control" name="name" value="{{ $user->name }}">
									@if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group input-group{{ $errors->has('surname') ? ' has-error' : '' }}">
									<span class="input-group-addon"><b>Surname</b></span>
									<input type="text" class="form-control" name="surname" value="{{ $user->surname }}">
									@if($errors->has('surname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group input-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
									<span class="input-group-addon"><b>Birthdate</b></span>
									<input type="date" class="form-control" name="birthdate" value="{{ $user->birthdate }}">
									@if($errors->has('birthdate'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<button class="btn btn-success btn-block">Save</button>
									@if(isset($changed) && $changed)
                                        <span class="help-block" align="center">
                                            <strong>Changes saved</strong>
                                        </span>
                                    @endif
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('sidebar')
@include('layouts.includes.sidebar')
@endsection