@extends("frontend.layouts.app")
@section("content")
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Account</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{url('/fontend/account/update/{id}')}}">account</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{url('/fontend/account/list')}}">My product</a></h4>
								</div>
							</div>
							
						</div><!--/category-products-->
					
						
					</div>
				</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Update user</h2>
						 <div class="signup-form"><!--sign up form-->
						<h2>Update user</h2>
						<?php
							foreach ($data as $value) {
						?>
						<form method="post" action="#" enctype="multipart/form-data">
							@csrf
							<input type="text" name="name" value="<?php echo $value->name; ?>" placeholder="Name"/>
							<input type="email" name="email" value="<?php echo $value->email; ?>" placeholder="Email Address"/>
							<input type="password" name="password" value="<?php echo $value->password; ?>" placeholder="Password"/>
							<input type="text" name="phone" value="<?php echo $value->phone; ?>" placeholder="Phone"/>
							<textarea rows="5" placeholder="Message"></textarea>
							<input type="file" name="avatar">
							<select>
                            <option>abc</option>
                            </select>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
						<?php
							}
						?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection