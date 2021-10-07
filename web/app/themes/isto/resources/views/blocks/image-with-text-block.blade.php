{{--
  Title: Image with text
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
    $image = get_field('image');
	$text = get_field('text');
?>

@if(!empty($image))
    <div class="block-image-with-text {{ $verticalSpace }}">
        <div class="lg:h-[742px] mb-12">
            <img src="{{ wp_get_attachment_image_url($image, 'xlarge') }}" class="w-full h-full object-cover" alt="">
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
@endif
