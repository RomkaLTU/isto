{{--
  Title: Manufacturers slider
  Category: design
  Icon: schedule
  Mode: edit
  Align: left
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

@php
$global = get_field('global');
$manufaturers = get_field('manufacturers');
$verticalSpace = $global['vertical_space'] ?? true ? 'my-80px' : '';
$title = $global['title'];

// dd($global);
@endphp

<div class="block-manufacturers-slider {{ $verticalSpace }}">
    <div class="container">
        @include('blocks.partials.title')

        <div class="swiper swiper-container-manufacturers overflow-hidden relative h-[544px]">
            <div class="swiper-wrapper">
                @foreach ($manufaturers as $manufacturer)
                    @php
                        $bgImage = wp_get_attachment_image_url( get_post_thumbnail_id( $manufacturer->ID ), 'xlarge' );
                        $logoImage = wp_get_attachment_image_url( get_field('logo', $manufacturer->ID), 'full' );
						$description = get_field('description', $manufacturer);
						$permalink = get_permalink($manufacturer);
                    @endphp
                    <div class="swiper-slide">
                        @include('partials.content-manufacturers-slider')
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        @include('blocks.partials.more-link', ['title' => __('Visi gamintojai', 'isto'), 'link' => \App\getPermalinkByTemplate('manufacturers')])
    </div>
</div>
