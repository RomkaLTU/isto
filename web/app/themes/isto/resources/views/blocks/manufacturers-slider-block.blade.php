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
$manufaturers = get_field('manufacturers');
$verticalSpace = get_field('vertical_space') ?? true ? 'my-70px' : '';
@endphp

<div class="block-manufacturers-slider {{ $verticalSpace }}">
    <div class="container">
        <h2 class="text-35px lg:pl-30px mb-3">{{ __('Gamintojai', 'isto') }}</h2>
        <div class="swiper swiper-container-manufacturers overflow-hidden relative h-[544px]">
            <div class="swiper-wrapper">
                @foreach ($manufaturers as $manufacturer)
                    @php
                        $bgImage = wp_get_attachment_image_url( get_post_thumbnail_id( $manufacturer->ID ), 'xlarge' );
                        $logoImage = wp_get_attachment_image_url( get_field('logo', $manufacturer->ID), 'full' );
                    @endphp
                    <a href="#" class="swiper-slide group block bg-cover bg-center"
                        style="background-image: url({{ $bgImage }})">
                        <div class="bg-white transition-opacity opacity-80 group-hover:opacity-100 w-[255px] h-[238px] flex items-center justify-center p-14">
                            <img src="{{ $logoImage }}" alt="{{  $manufacturer->post_title }}">
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="lg:pl-30px">
            <a href="#" class="with-arrow text-14px flex items-center space-x-1 mt-2">
                <span>{{ __('Visi gamintojai', 'isto') }}</span>
                <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
            </a>
        </div>
    </div>
</div>