{{--
  Title: Simple image
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
@endphp

@if($image)
    <div class="block-video {{ $verticalSpace }}">
        <div class="container max-w-[946px] mx-auto">
            <img src="{{ wp_get_attachment_image_url($image, 'xlarge') }}" class="object-cover w-full lg:max-w-[615px] mx-auto" alt="">
        </div>
    </div>
@endif
