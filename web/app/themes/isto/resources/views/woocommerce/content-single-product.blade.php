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
		<div class="flex-1 flex justify-start space-x-3">
			<span class="text-14px">{{ __('Dalintis', 'isto') }}</span>
			<div class="flex items-center justify-center space-x-4 mb-8">
				<a href="https://www.facebook.com/sharer/sharer.php?u={{ get_permalink($product->get_id()) }}"><img src="@asset('images/facebook.svg')" alt=""></a>
				<a href="//pinterest.com/pin/create/link/?url={{ get_permalink($product->get_id()) }}"><img src="@asset('images/pinterest.svg')" alt=""></a>
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
		<div class="flex-1 flex justify-end"></div>
	</div>

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
			<div>{{ __('Dizaineris', 'isto') }}: {{ $product->get_attribute('pa_dizaineris') }}</div>
			<div>{{ __('Gamintojas', 'isto') }}: {{ $product->get_attribute('pa_gamintojas') }}</div>
		</div>

		<div class="my-16 lg:my-80px">
			@include('partials.contact-form', ['product' => true])
		</div>

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
	</div>

	<div class="relative">
		<div class="swiper swiper-container-related max-w-[927px] mx-auto overflow-hidden relative">
			<div class="font-headings uppercase text-22px mb-6">{{ __('Jums taip pat gali patikti', 'isto') }}</div>
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
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
