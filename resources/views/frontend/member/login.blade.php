@extends("frontend.layouts.app")
@section("content")
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post" action="">
							@csrf
							@method('POST')
							<input type="text" name="email" placeholder="Email" />
							<input type="password" name="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection