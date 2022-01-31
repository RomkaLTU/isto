{{--
  Template Name: Favorites
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
        <div class="container max-w-[920px] py-40px">
            <h1 class="text-35px mb-6">{{ __('Mėgstamiausi', 'isto') }}</h1>
            <?php the_content(); ?>

            @if(empty($product_ids))
                <div class="text-center">
                    <div>{{ __('Mėgstamiausių produktų neturite', 'isto') }}</div>
                    <div>{{ __('Pažymėkite dominančius produktus.', 'isto') }}</div>
                    <div>{{ __('Tiesiog spustelėkite ant širdelės simbolio ir jis bus rodomas čia.', 'isto') }}</div>
                    <div>
                        <a href="{{ \App\getPermalinkByTemplate('product-categories') }}" class="with-arrow text-14px border border-black px-[55px] py-4 inline-flex items-center space-x-1 mt-8">
                            <span>{{ __('Produktų katalogas', 'isto') }}</span>
                            <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
                        </a>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8">
                    @foreach($product_ids as $productId)
				        <?php
				        $post = get_post($productId);
				        setup_postdata( $GLOBALS['post'] =& $post );
				        ?>
                        <div class="swiper-slide">
                            @include('woocommerce.content-product-inner')
                        </div>
                    @endforeach
                </div>

		        <?php wp_reset_postdata(); ?>

                <div class="my-16 lg:my-80px">
                    @include('partials.contact-form', [
                        'favorites' => true,
                        'favorites_list' => $product_ids,
                    ])
                </div>
            @endif
        </div>
    @endwhile
@endsection
