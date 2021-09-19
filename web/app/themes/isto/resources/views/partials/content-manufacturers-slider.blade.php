<a href="{{ $permalink ?? '#' }}" class="with-arrow scale-bg group block bg-center h-full"
   style="background-image: url({{ $bgImage }})">
    <div class="bg-white transition-opacity opacity-80 group-hover:opacity-100 w-[255px] h-[238px] flex flex-col items-center justify-center p-8">
        <img src="{{ $logoImage }}" alt="{{  $manufacturer->post_title }}" class="object-fill h-50px">
        @if(!empty($description))
            <div class="text-14px text-center mt-4">{!! $description !!}</div>
        @endif
        <div class="mt-4">
            <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
        </div>
    </div>
</a>
