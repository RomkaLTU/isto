{{--
  Title: Team
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
	$items = get_field('team');
@endphp

<div class="scrollmagic block-about {{ $verticalSpace }}">
    <div class="container max-w-[996px]">
        <div class="relative">
            <div class="anime-line-down absolute left-0 top-0 w-1px ml-1px lg:ml-0 lg:-mt-32 bg-black h-0"></div>
            <div class="overflow-hidden">
                <div class="anime-fade-from-left opacity-0 pl-4">
                    @include('blocks.partials.title')
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 lg:mt-16 lg:px-30px">
            @foreach($items as $item)
                <a href="{{ $item['link']['url'] }}" class="block">
                    <img src="{{ wp_get_attachment_image_url($item['image'], 'xlarge') }}" class="object-cover relative z-10 w-full h-[320px] mb-6" alt="">
                    <h3 class="text-22px uppercase mt-6">{{ $item['link']['title'] }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</div>
