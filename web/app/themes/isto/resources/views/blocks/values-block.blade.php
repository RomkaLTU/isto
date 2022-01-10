{{--
  Title: Values
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
	$imageId = get_field('image');
	$text = get_field('text');
@endphp

<div class="scrollmagic block-values {{ $verticalSpace }}">
    <div class="container">
        @include('blocks.partials.title')

        <div class="relative container max-w-[996px] mt-6 lg:mt-14">
            <div class="anime-line-down absolute left-0 top-0 w-1px ml-1px lg:ml-0 bg-black h-0"></div>
            <div class="overflow-hidden">
                <div class="anime-fade-from-left max-w-[765px] text-14px pl-4 lg:pl-8 opacity-0">
                    {!! $text !!}
                </div>
            </div>
        </div>

        <div class="mt-6">
            <img class="anime-fade-in opacity-0" src="{{ wp_get_attachment_image_url($imageId, 'xlarge') }}" alt="">
        </div>
    </div>
</div>
