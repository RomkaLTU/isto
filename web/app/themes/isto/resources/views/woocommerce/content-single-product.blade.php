<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$relatedProductIds = wc_get_related_products($product->get_id());
$productLocations = get_field('product_location');

$locations = [];

foreach ($productLocations as $productLocation) {
	switch ($productLocation['value']) {
		case 'kaunas':
			$locations[] = __('Kauno salonas', 'isto');
			break;
		case 'klaipeda':
			$locations[] = __('Klaipėdos salonas', 'isto');
			break;
	}
}

$productLocationsFormatted = implode(', ', $locations);

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID(); ?>" x-data="{ showMore: false }" <?php wc_product_class( '', $product ); ?>>

	@if($product->is_featured())
		<h2 class="text-35px mb-2">{{ __('YPATINGI PASIŪLYMAI', 'isto') }}</h2>
	@endif

	<div class="mb-4 lg:mb-50px">
		@if(!empty($product->get_gallery_image_ids()))
			<div class="swiper swiper-container-hero overflow-hidden relative h-[250px] lg:h-[500px]">
				<div class="swiper-wrapper">
					@foreach($product->get_gallery_image_ids() as $imageId)
						@php
							$image = wp_get_attachment_image_url($imageId, 'xlarge');
							$fullImage = wp_get_attachment_image_url($imageId, 'full');
						@endphp
						<a href="javascript:" data-fancybox="gallery" data-src="{{ $fullImage }}" class="swiper-slide group block bg-no-repeat bg-cover bg-center"
						   style="background-image: url({{ $image }})">&nbsp;</a>
					@endforeach
				</div>
				<div class="absolute top-0 cursor-pointer right-0 z-30 mr-6 mt-6" data-fancybox="gallery" data-src="{{ $fullImage }}">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
					</svg>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		@endif
	</div>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="flex flex-col lg:flex-row">
		<div class="flex-1 flex justify-between">
			@include('partials.share', ['post_id' => $product->get_id()])
			<div x-data class="cursor-pointer lg:hidden">
				<svg @click.prevent="$store.favs.toggleFav({{ $product->get_id() }})" xmlns="http://www.w3.org/2000/svg" width="26" viewBox="0 0 32.787 28.861">
					<g id="Like_icon" data-name="Like icon" transform="translate(0.5 0.5)">
						<path x-cloak="!$store.favs.items.includes({{ $product->get_id() }})" x-show="!$store.favs.items.includes({{ $product->get_id() }})" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" fill="none" stroke="#000" stroke-width="1"/>
						<path x-cloak="$store.favs.items.includes({{ $product->get_id() }})" x-show="$store.favs.items.includes({{ $product->get_id() }})" fill="#333" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" stroke="#000" stroke-width="1"/>
					</g>
				</svg>
			</div>
		</div>
		<div class="flex-1">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
		<div class="flex-1 hidden lg:flex justify-end">
			<div x-data class="cursor-pointer">
				<svg @click.prevent="$store.favs.toggleFav({{ $product->get_id() }})" xmlns="http://www.w3.org/2000/svg" width="26" viewBox="0 0 32.787 28.861">
					<g id="Like_icon" data-name="Like icon" transform="translate(0.5 0.5)">
						<path x-cloak="!$store.favs.items.includes({{ $product->get_id() }})" x-show="!$store.favs.items.includes({{ $product->get_id() }})" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" fill="none" stroke="#000" stroke-width="1"/>
						<path x-cloak="$store.favs.items.includes({{ $product->get_id() }})" x-show="$store.favs.items.includes({{ $product->get_id() }})" fill="#333" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" stroke="#000" stroke-width="1"/>
					</g>
				</svg>
			</div>
		</div>
	</div>

	@if($product->is_featured())
		<div class="inner-price text-center flex items-end flex-row-reverse justify-center">
			{!! $product->get_price_html() !!}
		</div>
	@endif

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>

	<div class="max-w-[862px] mx-auto">
		<div class="text-14px text-center my-6 prose-sm">
			{{ $product->get_short_description() }}
		</div>
		<div class="text-14px text-center">
			<div>{{ __('Dizaineris', 'isto') }}: <a href="{{ get_term_link($product->get_attribute('pa_dizaineris'), 'pa_dizaineris') }}">{!! $product->get_attribute('pa_dizaineris') !!}</a></div>
			<div>{{ __('Gamintojas', 'isto') }}: <a href="{{ get_term_link($product->get_attribute('pa_gamintojas'), 'pa_gamintojas') }}">{!! $product->get_attribute('pa_gamintojas') !!}</a></div>
			@if($product->is_featured())
				@if(!empty($stock_quantity = $product->get_stock_quantity()))
					<div>{{ __('Liko vienetu', 'isto') }}: {{ $stock_quantity }}</div>
				@endif
				@if($productLocations)
					<div>
						{{ __('Prekės vieta', 'isto') }}: {{ $productLocationsFormatted }}
					</div>
				@endif
			@endif
		</div>

		<div class="my-16 lg:my-80px">
			@include('partials.contact-form', [
				'product' => true,
				'product_link' => $product->get_permalink(),
				'product_title' => $product->get_title(),
			])
		</div>

		@if(!empty(get_the_content()))
			<div class="my-8 lg:my-80px">
				<div class="flex justify-center">
					<div @click.prevent="showMore = !showMore" class="text-14px cursor-pointer text-center inline-flex items-center justify-center space-x-3">
						<span>{{ __('Išsami informacija', 'isto') }}</span>
						<div x-cloak="showMore">
							<img x-show="!showMore" src="@asset('images/arrow-down.svg')" class="w-5" alt="">
							<img x-show="showMore" src="@asset('images/arrow-up.svg')" class="w-5" alt="">
						</div>
					</div>
				</div>
				<div x-cloak="showMore" x-show="showMore" x-collapse class="text-14px text-center my-6 prose-sm">
					<?php the_content(); ?>
				</div>
			</div>
		@endif
	</div>

	@if($relatedProductIds)
		@include('partials.products-swiper', ['title' => __('Jums taip pat gali patikti', 'isto')])
	@endif
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
