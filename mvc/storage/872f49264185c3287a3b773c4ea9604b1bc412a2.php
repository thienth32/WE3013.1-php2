<div class="product-rating">
    <?php for($i = 1; $i <= 5; $i++): ?>
        <i 
            <?php if($star >= $i): ?>
                class="fa fa-star"
            <?php elseif($star < $i && $star > $i-1): ?>
            class="fa fa-star-half-o"
            <?php else: ?>
            class="fa fa-star-o"
            <?php endif; ?>
        ></i>
    <?php endfor; ?>
</div><?php /**PATH /Library/WebServer/Documents/WE3013.1-php2/mvc/app/views/clients/_partials/product-rating.blade.php ENDPATH**/ ?>