{{--
  Title: Row images
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
    $images = get_field('images');
    $text = get_field('text')
@endphp

@if(!empty($images))
    <div class="scrollmagic block-about {{ $verticalSpace }}">
        <div class="container">
            <div class="grid grid-cols-3 gap-2 lg:gap-16">
                @foreach($images as $image)
                    <div class="relative">
                        <img src="{{ wp_get_attachment_image_url($image, 'xlarge') }}" class="w-full h-full object-cover" alt="">
                    </div>
                @endforeach
            </div>

            @if(!empty($text))
                <div class="max-w-[740px] mx-auto my-10 lg:my-80px text-14px text-center">
                    {!! $text !!}
                </div>
            @endif
        </div>
    </div>
@endif
