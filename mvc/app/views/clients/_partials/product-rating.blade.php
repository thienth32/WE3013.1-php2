<div class="product-rating">
    @for($i = 1; $i <= 5; $i++)
        <i 
            @if($star >= $i)
                class="fa fa-star"
            @elseif($star < $i && $star > $i-1)
            class="fa fa-star-half-o"
            @else
            class="fa fa-star-o"
            @endif
        ></i>
    @endfor
</div>