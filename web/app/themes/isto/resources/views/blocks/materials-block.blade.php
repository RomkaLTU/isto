{{--
  Title: Materials
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
	$slides = get_field('slides');
@endphp

<div class="scrollmagic block-about {{ $verticalSpace }}">
    <div class="container">
        @include('blocks.partials.title')

        <div class="overflow-hidden relative pb-75px">
            <div class="swiper swiper-container-materials h-590px">
                <div class="swiper-wrapper">
                    @foreach ($slides as $slide)
                        @php
                            $bgImage = wp_get_attachment_image_url($slide['image'], 'xlarge');
                            $content = $slide['content'];
                        @endphp
                        <a href="#" data-swiper-slide="{{ $loop->iteration - 1 }}" class="swiper-slide group block bg-no-repeat bg-cover bg-center"
                           style="background-image: url({{ $bgImage }})">
                            <div class="absolute bottom-0 left-0 right-0 mx-auto w-full max-w-[940px] opacity-90 lg:text-opacity-100 bg-white p-6 lg:p-8 -mb-20">
                                <h4 class="uppercase text-22px mb-4">{{ $content['title'] }}</h4>
                                <div class="text-14px">
                                    {!! $content['text'] !!}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination text-14px pr-8 !text-right"></div>
            </div>
        </div>
    </div>
</div>
