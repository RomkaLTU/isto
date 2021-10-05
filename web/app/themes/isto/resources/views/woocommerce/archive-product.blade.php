{{--
The Template for displaying product archives, including the main shop page which is a post type archive

This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.

HOWEVER, on occasion WooCommerce will need to update template files and you
(the theme developer) will need to copy the new files to your theme to
maintain compatibility. We try to do this as little as possible, but it does
happen. When this occurs the version of the template file will be bumped and
the readme will list any important changes.

@see https://docs.woocommerce.com/document/template-structure/
@package WooCommerce/Templates
@version 3.4.0
--}}

@extends('layouts.shop')

@section('content')
  @php
    //do_action('get_header', 'shop');
    do_action('woocommerce_before_main_content');
  @endphp

  <header class="woocommerce-products-header">
    @if (apply_filters('woocommerce_show_page_title', true))
      <h1 class="woocommerce-products-header__title page-title text-center lg:text-left text-22px lg:text-35px mb-6 lg:mb-4">{!! woocommerce_page_title(false) !!}</h1>
    @endif

    @php
      do_action('woocommerce_archive_description')
    @endphp
  </header>

  <div x-data="{ show: false }" class="my-4">
    <button @click.prevent="show = !show" class="flex items-center space-x-3">
      <svg xmlns="http://www.w3.org/2000/svg" width="18.552" height="14.453" viewBox="0 0 18.552 14.453">
        <g id="svgexport-3" transform="translate(-299 -372.09)">
          <path id="Path_284" data-name="Path 284" d="M303.312,377.6H299.5a.5.5,0,1,0,0,1h3.811a2.264,2.264,0,0,0,4.413,0h9.326a.5.5,0,0,0,0-1h-9.326a2.264,2.264,0,0,0-4.413,0Zm3.46.5a1.254,1.254,0,1,1-1.254-1.254A1.242,1.242,0,0,1,306.772,378.1Z" transform="translate(0 1.22)"/>
          <path id="Path_285" data-name="Path 285" d="M312.488,374.846h4.563a.5.5,0,0,0,0-1h-4.563a2.265,2.265,0,0,0-4.413,0H299.5a.5.5,0,1,0,0,1h8.574a2.265,2.265,0,0,0,4.413,0Zm-3.461-.5a1.254,1.254,0,1,1,1.254,1.254A1.242,1.242,0,0,1,309.027,374.345Z" transform="translate(0)"/>
          <path id="Path_286" data-name="Path 286" d="M317.051,381.348h-4.563a2.265,2.265,0,0,0-4.413,0H299.5a.5.5,0,0,0,0,1h8.574a2.265,2.265,0,0,0,4.413,0h4.563a.5.5,0,0,0,0-1Zm-6.769,1.755a1.254,1.254,0,1,1,1.254-1.254A1.242,1.242,0,0,1,310.282,383.1Z" transform="translate(0 2.44)"/>
        </g>
      </svg>
      <span>{{ __('Filtras', 'isto') }}</span>
    </button>
    <div x-cloak="show" x-show="show" class="lg:hidden inside-modal fixed w-full h-screen left-0 top-0 bg-gray-1 z-50 px-8">
      <div class="fixed left-0 top-0 w-full flex items-center bg-gray-1 justify-between z-50 py-30px px-8">
        <div class="uppercase">
          {{ __('Filtrai', 'isto') }}:
        </div>
        <div>
          <svg @click.prevent="show = !show" xmlns="http://www.w3.org/2000/svg" width="26.281" height="26.273" viewBox="0 0 26.281 26.273">
            <g id="Group_594" data-name="Group 594" transform="translate(14332.098 473.641)">
              <path id="Path_268" data-name="Path 268" d="M-14331.74-473.034l23.576,23.1,2,1.958" fill="none" stroke="#000" stroke-width="1"/>
              <path id="Path_269" data-name="Path 269" d="M-14331.74-473.034l23.576,23.1,2,1.958" transform="translate(-13858.706 -14779.457) rotate(-90)" fill="none" stroke="#000" stroke-width="1"/>
            </g>
          </svg>
        </div>
      </div>
      <div class="h-[calc(100%-185px)] relative inner-scroll bg-gray-1 mt-[90px]">
        @if (function_exists('dynamic_sidebar'))
          <?php dynamic_sidebar('sidebar-filters'); ?>
        @endif
      </div>
      <div class="fixed left-0 bottom-0 w-full bg-gray-1 flex justify-center space-x-3 z-50 pt-3 pb-10 px-8">
        <button class="bapf_button bapf_reset flex-1 border border-gray-2 uppercase text-14px px-3 py-2 bg-gray-1">{{ __('Panaikinti filtrą', 'isto') }}</button>
        <button @click.prevent="show = !show" class="flex-1 border border-black bg-black text-white uppercase text-14px px-3 py-2">{{ __('Uždaryti', 'isto') }}</button>
      </div>
    </div>
  </div>

  @if (woocommerce_product_loop())
    @php
      do_action('woocommerce_before_shop_loop');
      woocommerce_product_loop_start();
    @endphp

    @if (wc_get_loop_prop('total'))
      @while (have_posts())
        @php
          the_post();
          do_action('woocommerce_shop_loop');
          wc_get_template_part('content', 'product');
        @endphp
      @endwhile
    @endif

    @php
      woocommerce_product_loop_end();
      do_action('woocommerce_after_shop_loop');
    @endphp
  @else
    @php
      do_action('woocommerce_no_products_found')
    @endphp
  @endif

  @php
    do_action('woocommerce_after_main_content');
    do_action('get_sidebar', 'shop');
    do_action('get_footer', 'shop');
  @endphp
@endsection
