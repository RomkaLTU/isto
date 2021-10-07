<div class="flex justify-start space-x-3">
    <span class="text-14px">{{ __('Dalintis', 'isto') }}</span>
    <div class="flex items-center justify-center space-x-4 mb-8">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ get_permalink($post_id) }}"><img src="@asset('images/facebook.svg')" alt=""></a>
        <a href="//pinterest.com/pin/create/link/?url={{ get_permalink($post_id) }}"><img src="@asset('images/pinterest.svg')" alt=""></a>
    </div>
</div>
