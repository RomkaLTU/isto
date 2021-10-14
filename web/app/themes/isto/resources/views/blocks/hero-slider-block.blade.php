{{--
  Title: Hero slider
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
    $slides = get_field('slides');
@endphp

<div class="block-products {{ $verticalSpace }}">
    <div class="container">
        <div class="swiper swiper-container-hero overflow-hidden relative h-590px">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    @php
                        $bgImage = wp_get_attachment_image_url($slide['image'], 'xlarge');
                    @endphp
                    <a href="#" data-swiper-slide="{{ $loop->iteration - 1 }}" class="swiper-slide group block bg-no-repeat bg-cover bg-center"
                        style="background-image: url({{ $bgImage }})">
                        <div data-hero-line="{{ $loop->iteration - 1 }}" class="hero-line bg-white w-1px h-[150px] lg:h-[300px] absolute -top-full right-0 mr-[50%] lg:mr-[38%]">
                            <div data-hero-text="{{ $loop->iteration - 1 }}" class="hero-text opacity-0 relative h-full">
                                <div class="absolute bottom-0 left-0 -mb-32 lg:-ml-1 uppercase w-[320px] -translate-x-1/2 lg:transform-none text-center lg:text-left text-white text-50px leading-tight font-headings font-bold">
                                    {{ $slide['title'] }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
