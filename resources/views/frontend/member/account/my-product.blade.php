@extends('frontend.layouts.app')
@section('content')

	
		<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Id</td>
							<td class="description">Name</td>
                            <td class="image">Image</td>
							<td class="price">Price</td>
							<td class="action">Action</td>
							
						</tr>
					</thead>
					<tbody>
						@if(count($data))
						@foreach($data as $p)
						<tr>
							<td class="cart_product_id">
								<p>{{$p->id}}</p>
							</td>

							<td class="cart_description">
								<h4><a href="{{url('/frontend/account/detail-product/{id}')}}">{{$p->name}}</a></h4>
							</td>
							<td class="cart_product">
							</td>
							
							<td class="cart_price">
								<p>${{$p->price}}</p>
							</td>
							<td class="cart_delete">
								<a href="{{url('/frontend/account/edit-product/{id}')}}" class="btn btn-danger">Edit</a>
							</td>
						</tr>
						@endforeach
						@endif	

					</tbody>
				</table>
			</div>
	

@endsection