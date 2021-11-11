<?php
$isManufacturersTemplate = is_page_template('template-manufacturers.blade.php');
?>

<a href="{{ $permalink ?? '#' }}" class="with-arrow group block overflow-hidden relative h-full"
   style="background-image: url({{ $bgImage }})">
    <img src="{{ $bgImage }}" class="object-cover transition-transform duration-700 group-hover:scale-105 h-full w-full" alt="">
    <div class="absolute left-0 top-0 bg-white transition-opacity opacity-80 w-[255px] @if($isManufacturersTemplate) h-[310px] justify-between @else justify-center h-[238px] @endif flex flex-col items-center p-8">
        <img src="{{ $logoImage }}" alt="{{  $manufacturer->post_title }}" class="max-h-[160px]">
        @if($isManufacturersTemplate)
            <div class="flex flex-col items-center space-y-3">
                @if(!empty($description))
                    <div class="text-14px text-center mt-4">{!! $description !!}</div>
                @endif
                <div>
                    <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
                </div>
            </div>
        @endif
    </div>
</a>
