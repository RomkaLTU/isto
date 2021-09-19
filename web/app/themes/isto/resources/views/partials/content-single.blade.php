<div @php(post_class())>
  <div class="container relative mt-70px mb-100px">
    <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'xlarge') }}" alt="" class="lg:absolute lg:right-0 lg:bottom-0 lg:-mb-14 object-cover object-center h-64 lg:h-auto w-full max-w-[464px]">
    <div class="bg-white p-6 py-12 lg:p-50px lg:mr-[8%]">
      @if(!empty($logoId = get_field('logo')))
        <img src="{{ wp_get_attachment_image_url($logoId, 'xlarge') }}" class="max-w-[250px] mb-6" alt="">
      @endif

      <div class="prose-sm max-w-[530px]">
        {!! get_the_content() !!}
      </div>

      @if(!empty($url = get_field('url')))
        <a href="{{ $url }}" target="_blank" rel="nofollow" class="with-arrow text-14px border border-black px-[55px] py-4 inline-flex items-center space-x-1 mt-8">
          <span>{{ __('Daugiau info', 'isto') }}</span>
          <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
        </a>
      @endif
    </div>
  </div>
</div>
