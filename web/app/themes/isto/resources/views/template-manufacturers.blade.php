{{--
  Template Name: Manufacturers Template
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
        <div class="container py-40px">
            <div class="max-w-760px mb-5">
                <h2 class="text-35px mb-3">{{ get_the_title() }}</h2>
            </div>

            @if(!empty($content = get_the_content()))
                <div class="text-14px max-w-760px mb-8">
                    @php(the_content())
                </div>
            @endif

            @if(!empty($manufacturers))
                <div x-data="{
                    visiblePosts: [],
                    show: false,
                }" class="grid lg:grid-cols-3 gap-18px">
                    @foreach($manufacturers as $manufacturer)
                        <?php
                        $bgImage = $manufacturer['thumbnail']['xlarge'];
                        $logoImage = $manufacturer['logo']['xlarge'];
                        $permalink = $manufacturer['permalink'];
						$description = $manufacturer['description'];
                        ?>
                        <div x-intersect.once="visiblePosts.push({{ $manufacturer['id'] }})" class="h-[512px]">
                            <div x-show="visiblePosts.includes({{ $manufacturer['id'] }})" x-transition class="h-full">
                                @include('partials.content-manufacturers-slider')
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endwhile
@endsection
