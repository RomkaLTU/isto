@include('partials.header')

<div class="container my-40px">
    <div class="flex lg:space-x-30px">
        <div class="sidebar sidebar hidden lg:block lg:w-[250px]">
            @if (function_exists('dynamic_sidebar'))
                @php(dynamic_sidebar('primary'))
            @endif
        </div>
        <div class="flex-1">
            @yield('content')
        </div>
    </div>
</div>

@include('partials.footer')
