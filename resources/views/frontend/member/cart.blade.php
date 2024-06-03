@extends("frontend.layouts.app")
@section("content")
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

						<?php 
							$sum = 0;
							$cart = session()->get('cart');
							// dd($cart);
							foreach ($cart as $key => $value) {
								$tong = $value['price'] * $value['qty'];
								$sum = $sum + $tong;
						?>

						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $value['name']; ?></a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p><?php echo $value['price']; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a id="<?php echo $value['id']; ?>" class="cart_quantity_up"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $cart[$key]['qty']; ?>" autocomplete="off" size="2">
									<a id="<?php echo $value['id']; ?>" class="cart_quantity_down"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $cart[$key]['price'] * $cart[$key]['qty']; ?></p>
							</td>
							<td class="cart_delete">
								<a id="<?php echo $value['id']; ?>" class="cart_quantity_delete"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php
							}
						?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span class="total"><?php echo $sum;?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	<script>
			$(document).ready(function(){

				$.ajaxSetup({
	                headers: {

	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                }
            	});
				$("a.cart_quantity_up").click(function(){
					
					// lay id bang attr
					var getId = $(this).attr("id");
					var qty = $(this).closest("div.cart_quantity_button").find("input").val();
					var price = $(this).closest("tr").find(".cart_price p").text();
					// alert(qty);
					var tang = parseInt(qty) + 1;
					$(this).closest("div.cart_quantity_button").find("input").val(tang);

					var p = price.replace("$", "");
					var tong = parseFloat(p) * parseInt(tang);
					// alert(tong);
					$(this).closest("tr").find(".cart_total p").text(tong);
	
					var a1 = $("span.total").text();
					var a2 = parseInt(a1);
					sum = a2 + parseFloat(p);
					$("span.total").text(sum);
					


					// - xly truc tiep tren man hinh (tang qty va total len ma k can reload trang, bai js cu)
					// - tang qty trong SS php 


					
					// ajax(va nó chạy ngầm , giong form:)
					$.ajax({
						method: "POST",
						url: '{{url("/frontend/account/ajax_up")}}',
						data: {
							up: getId
							
						},
						success : function(res){
							
							// ket qua ben php tra ve lai
							console.log(res)
							
							
						}
					});
	
					// hanldeCart(getId, 1);
	
				});

				$("a.cart_quantity_down").click(function(){
					
					// lay id bang attr
					var getId = $(this).attr("id");
					var qty = $(this).closest("div.cart_quantity_button").find("input").val();
					var price = $(this).closest("tr").find(".cart_price p").text();
					// alert(getId);
					
					qty = qty - 1
					var p = price.replace("$", "")
					var tong = parseFloat(p) * parseInt(qty);
					// alert(tong);
					$(this).closest("tr").find(".cart_total p").text(tong);

					var b1 = $("span.total").text()
					var b2 = parseInt(b1)
					sum = b2 - parseFloat(p)
					$("span.total").text(sum)

					if(qty >= 1){
						
						$(this).closest("div.cart_quantity_button").find("input").val(qty);
					}
					else {
						$(this).closest("tr").remove();
					}
					

					
					// ajax(va nó chạy ngầm , giong form:)
					$.ajax({
						method: "POST",
						url: '{{url("/frontend/account/ajax_down")}}',
						data: {
							down: getId,

						},
						success : function(res){
							
							// ket qua ben php tra ve lai
							console.log(res)
							
							
						}
					});
	
					// hanldeCart(getId, 1);
	
				});


				$("a.cart_quantity_delete").click(function(){
					
					// lay id bang attr
					var getId = $(this).attr("id");
					// alert(getId);
					// console.log(getId)

					$(this).closest("tr").remove();

					var yyy = $(this).closest("tr").find(".cart_total p").text();
					var s = $("span.total").text();
					var zz = parseInt(s);

					sum = zz - yyy;
					$("span.total").text(sum);

					
					// ajax(va nó chạy ngầm , giong form:)
					$.ajax({
						method: "POST",
						url: '{{url("/frontend/account/ajax_delete")}}',
						data: {
							delete: getId,

							
						},
						success : function(res){
							
							// ket qua ben php tra ve lai
							// console.log(res)
							
							
						}
					});
	
					// hanldeCart(getId, 1);
	
				});

			});	
	</script>
@endsection