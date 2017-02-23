<div class="col-xs-4">
	<div class="row">
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Search by tag</h3>
				</div>
				<div class="panel-body">			
					<div class="input-group">
						<span class="input-group-addon">	
							<i class="fa fa-search"></i>
						</span>
						<input id="search-by-tag" type="text" class="form-control" placeholder="Search by tag">
					</div>
				</div>
			</div>
			<br>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Follow us on</h3>
				</div>
				<div class="panel-body">
					<form action="">
						<div class="input-group">
							<i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i>
							<a href="https://www.twitter.com" target="_blank" class="btn btn-link">Journal</a>
						</div>
						<div class="input-group">
							<i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i>
							<a href="https://www.facebook.com" target="_blank" class="btn btn-link">Journal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		console.log(window.location.pathname);
		$("#search-by-tag").keydown(function(event) {
			if(event.keyCode == 13) {
				var tags = $("#search-by-tag").val().match(/(\w+)/g);
				console.log(tags);
				location.pathname = "/searchbytag/"+tags;			
			}
		});
	});
</script>