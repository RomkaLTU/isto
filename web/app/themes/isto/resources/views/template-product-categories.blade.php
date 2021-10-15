{{--
  Template Name: Product categories
--}}

@extends('layouts.shop')

@section('content')
    @while(have_posts()) @php(the_post())
        <div class="container py-40px">
            <h1 class="text-35px mb-6">{{ __('Produktai', 'isto') }}</h1>

            @if(!empty($categories))
                <div class="grid lg:grid-cols-3 gap-8">
                    @foreach($categories as $category)
                        <?php
                            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_image_url($thumbnail_id, 'large');
                        ?>
                        <a href="{{ get_term_link($category) }}" class="group with-arrow block relative bg-white p-8">
                            <div class="h-[224px]">
                                <img class="object-cover transition-all group-hover:scale-110 max-w-[180px] h-[90%] mx-auto" src="{{ $image }}" alt="">
                            </div>
                            <div class="max-w-[170px] h-80px flex flex-col justify-end">
                                <h2 class="leading-6 text-22px">{{ $category->name }}</h2>
                                <div>
                                    <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    @endwhile
@endsection
