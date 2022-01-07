{{--
  Title: About
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
    $title = get_field('title');
	$text = get_field('text');
	$imageId = get_field('image');
@endphp

<div class="block-about {{ $verticalSpace }}">
    <div class="container">
        @if(!empty($title))
            <h2 class="!text-35px text-center mb-8">
                {{ $title }}
            </h2>
        @endif
        <div class="text-14px text-center mt-8 mb-20">
            {!! $text !!}
        </div>
        @if(!empty($imageId))
            <div>
                <img src="{{ wp_get_attachment_image_url($imageId, 'xlarge') }}" alt="">
            </div>
        @endif
    </div>
</div>
