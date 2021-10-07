{{--
  Title: Video
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
    $videoUrl = get_field('video_url');
	$title = get_field('title');
@endphp

@if(!empty($videoUrl))
    <div class="block-video {{ $verticalSpace }}">
        <div class="container max-w-[946px] mx-auto">
            @if(!empty($title))
                <h3 class="mb-3 text-22px uppercase">
                    {{ $title }}
                </h3>
            @endif
            <div>
                <iframe class="border-none w-full h-[250px] lg:h-[530px]" src="{{ \App\getYoutubeEmbedUrl($videoUrl) }}" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endif
