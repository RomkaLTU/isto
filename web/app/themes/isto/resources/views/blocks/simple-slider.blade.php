{{--
  Title: Simple slider
  Category: design
  Icon: schedule
  Mode: edit
  Align: left
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

<?php
    $verticalSpace = get_field('vertical_space') ?? true ? 'my-80px' : '';
    $slides = get_field('slides');
	$text = get_field('text');
?>

<div class="block-simple-slider {{ $verticalSpace }}">
    <div class="overflow-hidden relative pb-40px mb-8 lg:mb-0">
        <div class="swiper swiper-container-simple h-[300px] lg:h-[550px]">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <img src="{{ wp_get_attachment_image_url($slide['image'], 'xlarge') }}" class="swiper-slide object-cover h-full w-full group block" alt="">
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination text-14px !text-right"></div>
        </div>
    </div>

    <div class="relative scrollmagic max-w-[768px] mx-auto lg:min-h-[180px] lg:z-30">
        <div class="anime-line-down absolute left-0 top-0 w-1px ml-1px lg:ml-0 mt-[-100px] bg-black h-0"></div>
        <div class="overflow-hidden">
            <div class="anime-fade-from-left opacity-0 text-14px text-center pl-4">
                {!! $text !!}
            </div>
        </div>
    </div>
</div>
