{{--
  Title: Products
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
	$blocks = get_field('blocks');
@endphp

@if($blocks)
    <div class="block-products {{ $verticalSpace }}">
        <div class="container">
            @include('blocks.partials.title')

            <div class="grid lg:grid-cols-2 gap-16 lg:h-[574px]">
                @foreach ($blocks as $block)
                    @php
                        $image = wp_get_attachment_image_url( $block['image'], 'xlarge' );
                        $link = $block['link'];
                    @endphp
                    <a href="{{ $link['url'] }}" class="group no-hover block bg-cover bg-center"
                        style="background-image: url({{ $image }})">
                        @if(!empty($link['title']))
                            <h3 class="bg-white transition-opacity opacity-80 group-hover:opacity-100 w-[255px] h-[238px] text-center text-22px leading-tight flex items-center justify-center p-14">
                                {{ $link['title'] }}
                            </h3>
                        @endif
                    </a>
                @endforeach
            </div>

            @include('blocks.partials.more-link', ['title' => __('Visi produktai', 'isto'), 'link' => \App\getPermalinkByTemplate('product-categories') ])
        </div>
    </div>
@endif
