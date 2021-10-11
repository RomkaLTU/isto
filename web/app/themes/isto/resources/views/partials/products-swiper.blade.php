<div class="relative">
    <div class="swiper swiper-container-related max-w-[927px] mx-auto overflow-hidden relative">
        <div class="font-headings uppercase text-22px mb-6">{{ $title }}</div>
        <div class="swiper-wrapper">
            @foreach ($relatedProductIds as $postId)
				<?php
				$post = get_post($postId);
				setup_postdata( $GLOBALS['post'] =& $post );
				?>
                <div class="swiper-slide">
                    @include('woocommerce.content-product-inner')
                </div>
            @endforeach
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

	<?php wp_reset_postdata(); ?>
</div>
