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
							<a href="{{ url('/article/like/'.$article->id) }}" class="btn btn-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
							<i>{{ $article->rating }}</i>
							<a href="{{ url('/article/dislike/'.$article->id) }}" class="btn btn-danger"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
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
								<form action="">
									<div class="form-group">
										<textarea class="form-control comment-box" cols="30" rows="10" placeholder="Enter your text here..."></textarea>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Add">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
					
				<h3>Comments: <i>5</i></h3>

				<div class="panel panel-default">
					<div class="panel-heading">
						<b>Username</b><i class="pull-right">Wednesday, February 8, 2017 11:40 PM</i>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-1">
								<img src="http://placehold.it/48x48" alt="">
							</div>
							<div class="col-xs-11">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos? Voluptatibus, tenetur ab eaque? Praesentium.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos? Voluptatibus, tenetur ab eaque? Praesentium.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos? Voluptatibus, tenetur ab eaque? Praesentium.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos? Voluptatibus, tenetur ab eaque? Praesentium.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos? Voluptatibus, tenetur ab eaque? Praesentium.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos? Voluptatibus, tenetur ab eaque? Praesentium.
								</p>
								<hr>
								<a href="" class="btn btn-link" style="padding-left: 0;">Reply</a>
								<a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<div class="clearfix" style="margin-bottom: 15px;"></div>
								<div class="panel-group">
									<!-- Sub comment -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-success">
					<div class="panel-heading">
						<b>Author</b><i class="pull-right">Wednesday, February 8, 2017 11:49 PM</i>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-1">
								<img src="http://placehold.it/48x48" alt="">
							</div>
							<div class="col-xs-11">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos?
								</p>
								<hr>
								<a href="" class="btn btn-link" style="padding-left: 0;">Reply</a>
								<a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<div class="clearfix" style="margin-bottom: 15px;"></div>
								<div class="panel-group">
									<!-- Sub comment -->
									<div class="panel panel-default">
										<div class="panel-heading">
											<b>Username 1</b><i class="pull-right">Wednesday, February 8, 2017 11:49 PM</i>
										</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-1">
													<img src="http://placehold.it/48x48" alt="">
												</div>
												<div class="col-xs-11">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos?
													</p>
													<hr>
													<a href="" class="btn btn-link" style="padding-left: 0;">Reply</a>
													<a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
													<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- Sub comment -->
									<div class="panel panel-default">
										<div class="panel-heading">
											<b>Username 2</b><i class="pull-right">Wednesday, February 8, 2017 11:49 PM</i>
										</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-1">
													<img src="http://placehold.it/48x48" alt="">
												</div>
												<div class="col-xs-11">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos?
													</p>
													<hr>
													<a href="" class="btn btn-link" style="padding-left: 0;">Reply</a>
													<a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
													<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- Sub comment -->
									<div class="panel panel-default">
										<div class="panel-heading">
											<b>Username 3</b><i class="pull-right">Wednesday, February 8, 2017 11:49 PM</i>
										</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-1">
													<img src="http://placehold.it/48x48" alt="">
												</div>
												<div class="col-xs-11">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed, perspiciatis odit labore voluptas eligendi praesentium, voluptate ab aspernatur dignissimos consequatur iste corrupti, quis eos?
													</p>
													<hr>
													<a href="" class="btn btn-link" style="padding-left: 0;">Reply</a>
													<a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
													<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection