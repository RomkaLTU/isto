<?php

$product = wc_get_product($post->ID);
$manufacturer = $product->get_attribute('pa_gamintojas');

/**
 * Hook: woocommerce_before_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_open - 10
 */
do_action( 'woocommerce_before_shop_loop_item' );
?>

<div class="overflow-hidden mb-6">
	<div>
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
	</div>
</div>

<div>
	<div class="flex items-center justify-between">
		<?php
		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		str_replace(';', '|', '');
		do_action( 'woocommerce_shop_loop_item_title' );
		?>
		<div x-data :class="{'remove': $store.favs.items.includes({{ $product->get_id() }})}" class="toggle-favs cursor-pointer" @click.prevent="$store.favs.toggleFav({{ $product->get_id() }})">
			<svg class="heart-icon" xmlns="http://www.w3.org/2000/svg" width="26" viewBox="0 0 32.787 28.861">
				<g id="Like_icon" data-name="Like icon" transform="translate(0.5 0.5)">
					<path x-cloak="!$store.favs.items.includes({{ $product->get_id() }})" x-show="!$store.favs.items.includes({{ $product->get_id() }})" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" fill="none" stroke="#000" stroke-width="1"/>
					<path x-cloak="$store.favs.items.includes({{ $product->get_id() }})" x-show="$store.favs.items.includes({{ $product->get_id() }})" fill="#333" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" stroke="#000" stroke-width="1"/>
				</g>
			</svg>
			<svg class="trash-icon h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
			</svg>
		</div>
	</div>
    <div class="flex flex-col items-start text-14px">
        @if($manufacturer)
            <div>
                {!! $manufacturer !!}
            </div>
        @endif
        <div>
            <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
        </div>
    </div>
	@if($product->is_featured())
		<div class="product-price text-right flex items-end flex-row-reverse">
			{!! $product->get_price_html() !!}
		</div>
	@endif
</div>

<?php
/**
 * Hook: woocommerce_after_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_rating - 5
 * @hooked woocommerce_template_loop_price - 10
 */
do_action( 'woocommerce_after_shop_loop_item_title' );

/**
 * Hook: woocommerce_after_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_close - 5
 * @hooked woocommerce_template_loop_add_to_cart - 10
 */
do_action( 'woocommerce_after_shop_loop_item' );
?>
