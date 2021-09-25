{{--
  Title: Heading
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
    $type = get_field('type') ?? '2';
    $content = get_field('content');
@endphp

@if(!empty($content))
    <div class="block-contact container">
        <h{{$type}} class="text-35px my-8">
            {{ $content }}
        </h>
    </div>
@endif
