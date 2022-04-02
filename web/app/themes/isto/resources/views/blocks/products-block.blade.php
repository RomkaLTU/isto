{{--
  Title: Products
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
    $verticalSpace = get_field('vertical_space') ?? true ? 'my-80px' : '';
    $title = get_field('global')['title'];
	$blocks = get_field('blocks');
@endphp

@if($blocks)
    <div class="block-products {{ $verticalSpace }}">
        <div class="container">
            @include('blocks.partials.title')

            <div class="swiper swiper-container-products overflow-hidden relative h-[544px]">
                <div class="swiper-wrapper">
                    @foreach ($blocks as $block)
                        @php
                            $image = wp_get_attachment_image_url( $block['image'], 'xlarge' );
                            $link = $block['link'];
                        @endphp
                        <div class="swiper-slide">
                            <a href="{{ $link['url'] }}" class="group no-hover block bg-cover overflow-hidden bg-center h-full">
                                <img src="{{ $image }}" class="object-cover transition-transform duration-700 group-hover:scale-105 h-full w-full" alt="">
                                @if(!empty($link['title']))
                                    <h3 class="absolute top-0 left-0 bg-white transition-opacity opacity-80 w-[255px] h-[238px] text-center text-22px leading-tight flex items-center justify-center p-14">
                                        {{ $link['title'] }}
                                    </h3>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            @if($currentLang === 'lt')
              @include('blocks.partials.more-link', ['title' => __('Visi produktai', 'isto'), 'link' => \App\getPermalinkByTemplate('product-categories') ])
            @endif
        </div>
    </div>
@endif
