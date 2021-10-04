{{--
  Title: Contact us
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
    $title = get_field('title');
@endphp

<div class="block-contact-us {{ $verticalSpace }}">
    <div class="container">
        <div class="max-w-[760px] mb-5">
            @if (!empty($title['heading']))
                <h2 class="text-22px mb-3">{{ $title['heading'] }}</h2>
            @endif
            @if (!empty($title['subheading']))
                <div class="text-14px">{{ $title['subheading'] }}</div>
            @endif
        </div>
        @include('partials.contact-form')
    </div>
</div>
