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
                                    <h4 class="panel-title"><a href="">My product</a></h4>
                                </div>
                            </div>
                            
                        </div><!--/category-products-->
                    
                        
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Create brand</h2>
                         <div class="signup-form"><!--sign up form-->
                        <h2>Create brand</h2>
                        <form method="post" action="#">
                            @csrf
                            <input type="text" name="name" placeholder="Name"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection