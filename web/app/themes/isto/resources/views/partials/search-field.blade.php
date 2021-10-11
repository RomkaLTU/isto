<form role="search" method="get" action="{{ get_permalink( wc_get_page_id( 'shop' ) ) }}">
    <label class="flex items-center">
        <span><svg xmlns="http://www.w3.org/2000/svg" width="20.883" height="20.211" viewBox="0 0 20.883 20.211"><defs><style>.a{fill:none;stroke-linecap:round;}.a,.b{stroke:#000;stroke-width:3px;}.b{fill:#f5f5f5;stroke-miterlimit:10;}</style></defs><g transform="translate(-481.375 -22)"><g transform="translate(482.875 23.5)"><path class="a" d="M10.3,9.623,0,0" transform="translate(6.967 6.968)"/><path class="b" d="M497.81,1075.629a6.968,6.968,0,1,1-6.968-6.968A6.939,6.939,0,0,1,497.81,1075.629Z" transform="translate(-483.875 -1068.661)"/></g></g></svg></span>
        <input type="search" name="s" class="bg-transparent border-none placeholder-gray-2 text-14px outline-none focus:ring-0" placeholder="{{ __('PRODUKTŲ PAIEŠKA', 'isto') }}">
        <input type="hidden" name="post_type" value="product">
    </label>
</form>
