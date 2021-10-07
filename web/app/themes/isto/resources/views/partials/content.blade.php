<a href="{{ get_permalink() }}" class="group with-arrow">
  <div class="overflow-hidden mb-4">
    <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'xlarge') }}" class="object-cover transform transition duration-500 group-hover:scale-110" alt="">
  </div>
  <div>
    <div class="text-14px my-2">{{ get_the_date('Y.m.d') }}</div>
    <h2 class="text-22px leading-tight mb-2">{!! $title !!}</h2>
    <div class="text-14px">{!! get_the_excerpt() !!}</div>
    <div>
      <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
    </div>
  </div>
</a>
