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
									<h4 class="panel-title"><a href="{{url('/frontend/account/update/{id}')}}">account</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="">My product</a></h4>
								</div>
							</div>
							
						</div><!--/category-products-->
					
						
					</div>
				</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Create product</h2>
						 <div class="signup-form"><!--sign up form-->
						<h2>Create product</h2>
						<form method="post" action="#" enctype="multipart/form-data">
							@csrf
							<input type="text" name="name" placeholder="Name"/>
							<input type="text" name="price" placeholder="Price"/>
							<select name="id_category">
								<?php
									foreach ($category as $value) {
								?>	
	                            	<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
	                            <?php
	                            	}
	                            ?>
                            </select>
                            <select name="id_brand">
                            	<?php
									foreach ($brand as $value) {
								?>
                            		<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                            	<?php
	                            	}
	                            ?>
                            </select>
                            <select name="status">
                            <option>new</option>
                            <option>sale</option>
                            </select>
							<input type="text" name="sale" placeholder="Sale"/>
							<input type="text" name="company" placeholder="Company"/>
							<input type="file" name="hinhanh">
							<textarea rows="5" name="detail" placeholder="Detail"></textarea>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection