<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <!--product list-->
                        <div class="product-list">
                            <div class="product-img">
                                
                                <?php $__currentLoopData = $item->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->iteration >= 3): ?>
                                        <?php break; ?>
                                    <?php endif; ?>
                                    <a href="#">
                                        <img src="<?php echo e(PUBLIC_PATH . $img->img_url); ?>" alt="" />
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->sale_price > 0): ?>
                                <div class="sale-label">
                                    Sale
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="product-title">
                                <h5><a href="#"><?php echo e($item->name); ?></a></h5>
                            </div>
                            <div class="product-price">
                                <?php if($item->sale_price > 0): ?>
                                <del><?php echo e($item->price); ?></del> <?php echo e($item->sale_price); ?>

                                <?php else: ?>
                                <?php echo e($item->price); ?>

                                <?php endif; ?>
                            </div>
                            <?php echo $__env->make('clients._partials.product-rating', ['star' => $item->stars], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="product-btn">
                                <a href="#" class="btn btn-extra-small btn-dark-border  "><i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <!--product list-->
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                        <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="#"><?php echo e($c->name); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <?php $__currentLoopData = $latestProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="<?php echo e(PUBLIC_PATH); ?>assets/img/product/1.jpg" alt="">
                                </a>
                            </div>
                            <div class="w-desk">
                                <a href="#"><?php echo e($lp->name); ?></a>
                                <div class="price"><?php echo e(!empty($lp->sale_price) ? $lp->sale_price : $lp->price); ?></div>
                                <?php echo $__env->make('clients._partials.product-rating', ['star' => $lp->stars], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="product-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </ul>
                </div>
                <!--latest product-->


                <!--top rated product-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">Top Rated Products</h6>
                    </div>
                    <ul class="widget-latest-post">
                        <?php $__currentLoopData = $toprateProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="<?php echo e(PUBLIC_PATH); ?>assets/img/product/1.jpg" alt="">
                                </a>
                            </div>
                            <div class="w-desk">
                                <a href="#"><?php echo e($tp->name); ?></a>
                                <div class="price"><?php echo e(!empty($tp->sale_price) ? $tp->sale_price : $tp->price); ?></div>
                                <?php echo $__env->make('clients._partials.product-rating', ['star' => $tp->stars], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="product-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('clients.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/WE3013.1-php2/mvc/app/views/home/index.blade.php ENDPATH**/ ?>