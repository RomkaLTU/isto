{{--
  Title: Person
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
    $image = get_field('image');
    $title = get_field('title');
    $name = get_field('name');
	$text = get_field('text');
@endphp

<div class="scrollmagic block-values {{ $verticalSpace }}">
    <div class="container">
        <div class="flex flex-col lg:flex-row items-center lg:space-x-90px">
            @if($image)
                <div class="flex-none w-full max-w-[380px] mb-4 lg:mb-0">
                    <img src="{{ wp_get_attachment_image_url($image, 'xlarge') }}" alt="">
                </div>
            @endif
            <div class="flex-1">
                <div class="text-14px uppercase">{{ $title }}</div>
                <h3 class="text-22px uppercase my-4">{{ $name }}</h3>
                <div class="text-14px">{!! $text !!}</div>
            </div>
        </div>
    </div>
</div>
