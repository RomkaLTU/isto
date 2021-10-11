<div class="container my-40px prose-sm">
    @if(is_privacy_policy())
        <h1>{!! $title !!}</h1>
    @endif
    @php(the_content())
</div>
