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
    $verticalSpace = get_field('vertical_space') ?? true ? 'my-70px' : '';
    $title = get_field('global')['title'];
    $categories = get_field('product_categories');
@endphp

<div class="block-products {{ $verticalSpace }}">
    <div class="container">
        @include('blocks.partials.title')

        <div class="grid lg:grid-cols-2 gap-16 lg:h-[574px]">
            @foreach ($categories as $category)
            @php
                $categoryImage = wp_get_attachment_image_url( get_term_meta($category->term_id, 'thumbnail_id', true), 'large' );
            @endphp
                <a href="#" class="group block bg-cover bg-center"
                    style="background-image: url({{ $categoryImage }})">
                    <h3 class="bg-white transition-opacity opacity-80 group-hover:opacity-100 w-[255px] h-[238px] text-center text-22px leading-tight flex items-center justify-center p-14">
                        {{ $category->name }}
                    </h3>
                </a>
            @endforeach
        </div>

        @include('blocks.partials.more-link', ['title' => __('Visi produktai', 'isto'), 'link' => '#'])
    </div>
</div>