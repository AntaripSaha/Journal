@extends('layouts.main')

@section('content')
<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Journal wall</h3>
			<hr>
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title pull-left"><b><a href="article=1">Lorem ipsum dolor sit amet</a></b></h3>
						<div class="pull-right">
							<a href="edit.news.html" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio aliquam, eius ea. Modi, natus, quis quibusdam maiores provident doloremque labore amet explicabo pariatur repellat deleniti dolore, eaque cupiditate. Fugiat, saepe.</p>
						<a href="news.html" class="btn btn-link pull-right">Read more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('sidebar')
@include('layouts.includes.sidebar')
@endsection