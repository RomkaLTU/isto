{{--
  Title: History
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
	$items = get_field('history');
	$firstItems = array_slice($items, 0, 2);
	$otherItems = array_slice($items, 2);
@endphp

<div x-data="{showMore: false}" class="block-values {{ $verticalSpace }}">
    <div class="container">
        @include('blocks.partials.title')

        <div class="grid lg:grid-cols-2 gap-75px gap-y-18">
            @foreach($firstItems as $item)
                @include('blocks.partials.history-content')
            @endforeach

            @foreach($otherItems as $item)
                <div
                    x-cloak="showMore"
                    x-show="showMore"
                    x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 transform scale-90" 
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-1000"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">
                    @include('blocks.partials.history-content')
                </div>
            @endforeach

            <a href="#" @click.prevent="showMore = !showMore" class="text-14px flex items-center space-x-2">
                <span x-show="!showMore">{{ __('Rodyti daugiau', 'isto') }}</span>
                <span x-show="showMore">{{ __('Rodyti mažiau', 'isto') }}</span>
                <svg x-show="!showMore" xmlns="http://www.w3.org/2000/svg" class="h-6 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                <svg x-show="showMore" xmlns="http://www.w3.org/2000/svg" class="h-6 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </a>
        </div>
    </div>
</div>
