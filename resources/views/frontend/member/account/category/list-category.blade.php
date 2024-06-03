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
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="description">id</td>
                                    <td class="price">name</td>                                    
                                    <td class="total">action</td>
                                    <td class="total">action</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    foreach ($data as $value) {
                                ?>
                                    <tr>
                                        <td class="cart_description">
                                            <h4><a href=""><?php echo $value->id; ?></a></h4>
                                        </td>
                                         <td class="cart_description">
                                            <h4><a href=""><?php echo $value->name; ?></a></h4>
                                        </td>                                        
                                        <td class="cart_total">
                                            <a>edit</a>
                                        </td>
                                        <td class="cart_total">
                                            <a>delete</a>
                                        </td>                                   
                                    </tr>
                                <?php
                                    }
                                ?>
                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection