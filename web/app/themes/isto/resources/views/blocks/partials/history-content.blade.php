<div>
    <div class="mb-6">
        <img src="{{ wp_get_attachment_image_url($item['image'], 'xlarge') }}" alt="">
    </div>
    <div>
        <h2 class="text-22px mb-2">{{ $item['title'] }}</h2>
        <div class="text-14px">{!! $item['text'] !!}</div>
    </div>
</div>
