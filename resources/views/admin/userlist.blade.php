@extends('layouts.main')

@section('content')
<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Admin panel</h3>
			<hr>
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="panel-body">
							<table class="table">
								<tr>
									<th>ID</th><th>USERNAME</th><th>NAME</th><th>SURNAME</th><th>EMAIL</th><th>BIRTHDATE</th><th>ADMIN</th>
								</tr>
							@foreach($userlist as $user)
								<tr>
									<td>{{$user->id}}</td><td>{{$user->username}}</td><td>{{$user->name}}</td><td>{{$user->surname}}</td><td>{{$user->email}}</td><td>{{$user->birthdate}}</td><td>{{$user->admin}}</td>
								</tr>											
							@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('sidebar')
<div class="col-xs-4">
	<div class="row">
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Admin panel</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group">
						<a href="{{ route('adminIndex') }}" class="list-group-item">Index</a>
						<a href="{{ route('userList') }}" class="list-group-item">User list</a>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection