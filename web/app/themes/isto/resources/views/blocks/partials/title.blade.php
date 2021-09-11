<div class="lg:pl-30px max-w-[760px] mb-5">
    @if (!empty($title['heading']))
        <h2 class="text-35px mb-3">{{ $title['heading'] }}</h2>
    @endif

    @if (!empty($title['subheading']))
        <div class="text-14px">{{ $title['subheading'] }}</div>
    @endif
</div>
