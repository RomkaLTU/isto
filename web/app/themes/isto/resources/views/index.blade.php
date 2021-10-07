@extends('layouts.app')

@section('content')
  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Informacija ruošiama.', 'isto') !!}
    </x-alert>
  @endif

  <div class="container my-40px">
    <div>
      <?php
      $stickyPost = \Illuminate\Support\Arr::first(get_option('sticky_posts'));
      $post = get_post($stickyPost);
      ?>
    </div>
    <div class="h-[560px] relative lg:mb-[150px]">
      <img src="{{ get_the_post_thumbnail_url($post, 'xlarge') }}" class="object-cover object-center w-full max-w-[907px] h-full" alt="">
      <div class="absolute bottom-0 lg:bottom-auto lg:top-0 right-0 lg:h-full bg-white bg-opacity-95 lg:w-[469px] flex items-center p-8 lg:p-100px lg:mt-14">
        <div>
          <div class="text-14px">{{ get_the_date('Y.m.d', $post) }}</div>
          <h2 class="text-22px uppercase leading-tight my-3">{{ get_the_title($post) }}</h2>
          <div class="text-14px my-6">{!! get_the_excerpt($post) !!}</div>
          <a href="{{ get_permalink($post) }}" class="with-arrow text-14px border border-black px-[55px] py-4 inline-flex items-center space-x-1">
            <span>{{ __('Daugiau info', 'isto') }}</span>
            <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
          </a>
        </div>
      </div>
    </div>

    <div class="flex flex-wrap space-x-4 text-14px uppercase justify-center my-14">
      <a href="{{ get_post_type_archive_link('post') }}" class="{{ in_array(get_queried_object_id(), \Illuminate\Support\Arr::pluck(get_categories(), 'term_id')) ? '' : 'underline' }}">
        {{ __('Visi', 'isto') }}
      </a>
      @foreach(get_categories() as $category)
          <a href="{{ get_category_link($category) }}" class="{{ get_queried_object_id() == $category->term_id ? 'underline' : '' }}">
          {{ $category->name }}
        </a>
      @endforeach
    </div>

    <div class="grid lg:grid-cols-3 gap-4 lg:gap-50px">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      @endwhile
    </div>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
