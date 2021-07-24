<?php $__env->startSection('content'); ?>
    <form action="" method="GET">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Từ khóa:</label>
                    <input type="text" name="keyword" class="form-control" value="<?php echo e($keyword); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <br>
    <div class="row">
        <table class="table table-stripped">
            <thead>
                <th>STT</th>
                <th>Tên Sản phẩm</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Màu</th>
                <th>
                    <a href="<?php echo e(BASE_URL . 'admin/product/add'); ?>" class="btn btn-primary">Thêm mới</a>
                </th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($p->name); ?></td>
                        <td>
                            <img src="<?php echo e(PUBLIC_PATH . $p->galleries[0]->img_url); ?>" width="80">
                        </td>
                        <td><?php echo e($p->category->name); ?></td>
                        <td>
                            <?php if($p->sale_price > 0): ?>
                            <del>$<?php echo e($p->price); ?></del> <b>$<?php echo e($p->sale_price); ?></b>
                            <?php else: ?>
                            $<?php echo e($p->price); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php echo e($p->quantity); ?></td>
                        <td>
                            <ul>
                                <?php $__currentLoopData = $p->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($c->name); ?>: 
                                    <?php $__currentLoopData = $p->pQuantites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($c->id == $pq->color_id): ?>
                                            <?php echo e($pq->amount); ?>

                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                        <td>
                            <a href="<?php echo e(BASE_URL . 'admin/product/edit?id=' . $p->id); ?>" class="btn btn-info">Sửa</a>
                            <a href="<?php echo e(BASE_URL . 'admin/product/remove?id=' . $p->id); ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/WE3013.1-php2/mvc/app/views/admin/product/index.blade.php ENDPATH**/ ?>