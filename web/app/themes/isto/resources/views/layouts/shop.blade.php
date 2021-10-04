@include('partials.header')

<div class="container my-40px">
    <div class="flex lg:space-x-30px">
        <div class="sidebar sidebar hidden lg:block lg:w-[250px]">
            <div class="border-b border-gray-2 mb-8">
                @include('partials.search-field')
            </div>

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
