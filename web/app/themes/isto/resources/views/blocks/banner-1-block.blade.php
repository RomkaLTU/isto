{{--
  Title: Banner 1
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
$link = get_field('link');
$title = get_field('title');
$subtitle = get_field('subtitle');
$imageId = get_field('image');
$verticalSpace = get_field('vertical_space') ?? true ? 'my-80px' : '';
@endphp

<div class="block-banner-1 container {{ $verticalSpace }}">
    @if(empty($link))
        <div class=" bg-white p-70px with-arrow">
    @else
        <a href="{{ $link }}" class="bg-white block p-50px lg:p-70px with-arrow">
    @endif
        <div class="flex flex-col-reverse lg:flex-row lg:items-center lg:justify-between">
            <div class="flex-1 max-w-[600px] mt-4 lg:mt-0">
                @if(!empty($title))
                    <h3 class="text-22px mb-1 lg:mb-0 lg:text-35px">{{ $title }}</h3>
                @endif
                @if(!empty($subtitle))
                    <div class="text-14px">{{ $subtitle }}</div>
                @endif
                @if(!empty($link))
                    <img src="@asset('images/arrow-right-1.svg')" class="arrow-right -ml-1" alt="">
                @endif
            </div>
            <div class="flex-none max-w-[185px]">
                <img src="{{ wp_get_attachment_image_url($imageId, 'full') }}" alt="">
            </div>
        </div>
    @if(empty($link)) </div> @else </a> @endif
</div>
