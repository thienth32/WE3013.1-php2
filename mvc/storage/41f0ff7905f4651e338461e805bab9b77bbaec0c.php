<?php $__env->startSection('content'); ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e($model->name); ?>">
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="cate_id" id="" class="form-control">
                        <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($c->id == $model->cate_id): ?> selected <?php endif; ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Số lượng tổng</label>
                    <input type="text" name="quantity" class="form-control" value="<?php echo e($model->quantity); ?>">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Giá gốc</label>
                    <input type="text" name="price" class="form-control" value="<?php echo e($model->price); ?>">
                </div>
                <div class="form-group">
                    <label for="">Giá khuyến mại</label>
                    <input type="text" name="sale_price" class="form-control" value="<?php echo e($model->sale_price); ?>">
                </div>
            </div>
            <div class="col-12">
                <input type="hidden" name="removeGalleryId">
                <table class="table table-stripped">
                    <thead>
                        <th>Url/Input</th>
                        <th>Ảnh</th>
                        <th>
                            <button id="addGalleryRow" type="button" class="btn btn-sm btn-success">Thêm ảnh</button>
                        </th>
                    </thead>
                    <tbody id="gallery_tbody">
                        <?php $__currentLoopData = $model->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="file" name="galleries[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <img src="<?php echo e(PUBLIC_PATH . $item->img_url); ?>" width="80">
                                </td>
                                <td>
                                    <button type="button" onclick="noteRemoveImage(this, <?php echo e($item->id); ?>)" class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea class="form-control" rows="3" name="short_desc"><?php echo e($model->short_desc); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" rows="5" name="pro_desc"><?php echo e($model->pro_desc); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Chi tiết thông số</label>
                    <textarea class="form-control" rows="5" name="specification"><?php echo e($model->specification); ?></textarea>
                </div>
                <div class="text-right">
                    <a href="<?php echo e(BASE_URL . 'admin/product'); ?>" class="btn btn-danger">Hủy</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
    <br>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescript'); ?>
    <script>
        function noteRemoveImage(el, galleryId = null){
            if(galleryId != null){
                let removeIds = $('[name="removeGalleryId"]').val();
                removeIds += `|${galleryId}`;
                $('[name="removeGalleryId"]').val(removeIds);
            }
            $(el).parent().parent().remove();
        }
        $(document).ready(function(){
            $('#addGalleryRow').click(function(){
                $('#gallery_tbody').append(`
                    <tr>
                        <td>
                            <div class="form-group">
                                <input type="file" name="galleries[]" class="form-control">
                            </div>
                        </td>
                        <td>
                            <img src="" width="80">
                        </td>
                        <td>
                            <button type="button" onclick="noteRemoveImage(this)" class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                `);
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/WE3013.1-php2/mvc/app/views/admin/product/edit-form.blade.php ENDPATH**/ ?>