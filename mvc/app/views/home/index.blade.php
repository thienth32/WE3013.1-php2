@extends('clients.layouts.main')
@section('title', 'Trang chủ')
@section('content')
<div class="page-content product-grid">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <!--product option-->
                <div class="clearfix m-bot-30 inline-block">

                    <div class="pull-left">
                        <form method="post" action="#">
                            <select class="form-control">
                                <option>Default sorting</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average ratings</option>
                                <option>Sort by newness</option>
                                <option>Sort by price: low to high</option>
                                <option>Sort by price: high to low</option>
                            </select>
                        </form>
                    </div>

                    <div class="pull-left m-top-5 m-left-10">
                        Showing 1–10 of 55 results
                    </div>

                    <div class="pull-right shop-view-mode">
                        <a href="#"> <i class="fa fa-th-large"></i> 
                        </a>
                        <a href="#"> <i class="fa fa-th-list"></i> 
                        </a>
                    </div>

                </div>
                <!--product option-->
                <div class="row">
                    @foreach($products as $key => $item)
                    <div class="col-md-4">
                        <!--product list-->
                        <div class="product-list">
                            <div class="product-img">
                                
                                @foreach($item->galleries as $img)
                                    @if($loop->iteration >= 3)
                                        @break
                                    @endif
                                    <a href="#">
                                        <img src="{{PUBLIC_PATH . $img->img_url}}" alt="" />
                                    </a>
                                @endforeach
                                @if($item->sale_price > 0)
                                <div class="sale-label">
                                    Sale
                                </div>
                                @endif
                            </div>
                            <div class="product-title">
                                <h5><a href="#">{{$item->name}}</a></h5>
                            </div>
                            <div class="product-price">
                                @if($item->sale_price > 0)
                                <del>{{$item->price}}</del> {{$item->sale_price}}
                                @else
                                {{$item->price}}
                                @endif
                            </div>
                            @include('clients._partials.product-rating', ['star' => $item->stars])
                            <div class="product-btn">
                                <a href="#" class="btn btn-extra-small btn-dark-border  "><i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <!--product list-->
                    </div>
                    @endforeach

                    <div class="text-center col-md-12">
                        <ul class="pagination custom-pagination">
                            <li><a href="#">Prev</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">Next</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-3 ">
                <!--product category-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">product category</h6>
                    </div>
                    <ul class="widget-category">
                        @foreach($cates as $c)
                        <li><a href="#">{{$c->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!--product category-->

                <!--price filter-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">price filter</h6>
                    </div>
                    <form method="post" action="#">

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <input type="text" name="price-from" id="price-from" class=" form-control" placeholder="From, $" maxlength="100">
                            </div>

                            <div class="col-xs-12 form-group">
                                <input type="text" name="price-to" id="price-to" class=" form-control" placeholder="To, $" maxlength="100">
                            </div>
                            <div class=" col-xs-12 form-group">
                                <button class="btn btn-small btn-dark-border  btn-transparent">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--price filter-->


                <!--latest product-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">latest Products</h6>
                    </div>
                    <ul class="widget-latest-post">
                        @foreach($latestProducts as $lp)
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{PUBLIC_PATH}}assets/img/product/1.jpg" alt="">
                                </a>
                            </div>
                            <div class="w-desk">
                                <a href="#">{{$lp->name}}</a>
                                <div class="price">{{!empty($lp->sale_price) ? $lp->sale_price : $lp->price }}</div>
                                @include('clients._partials.product-rating', ['star' => $lp->stars])
                                <div class="product-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
                <!--latest product-->


                <!--top rated product-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">Top Rated Products</h6>
                    </div>
                    <ul class="widget-latest-post">
                        @foreach($toprateProducts as $tp)
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{PUBLIC_PATH}}assets/img/product/1.jpg" alt="">
                                </a>
                            </div>
                            <div class="w-desk">
                                <a href="#">{{$tp->name}}</a>
                                <div class="price">{{!empty($tp->sale_price) ? $tp->sale_price : $tp->price }}</div>
                                @include('clients._partials.product-rating', ['star' => $tp->stars])
                                <div class="product-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
                <!--top rated product-->


                <!--product tags-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">PRODUCT TAGS</h6>
                    </div>
                    <div class="widget-tags">
                        <a href="#">Accessories</a>
                        <a href="#">Branding</a>
                        <a href="#">Belts</a>
                        <a href="#">Cloth</a>
                        <a href="#">Kids</a>
                        <a href="#">Watch</a>
                        <a href="#">Shoes</a>
                    </div>
                </div>
                <!--product tags-->

            </div>

        </div>
    </div>
</div>
@endsection