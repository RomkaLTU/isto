<?php
$artableLogoId = get_field('global', 'options')['artable_logo'];
$artableLink = get_field('global', 'options')['artable_link'];
?>

<div class="flex space-x-4">
    <a class="brand no-hover" href="{{ home_url('/') }}">
        <img src="@asset('images/logo.svg')" alt="">
    </a>

    @if($artableLogoId)
        <a href="{{ $artableLink }}" class="border-l pl-3 no-hover" target="_blank">
            <img class="opacity-10 transition-opacity duration-500 hover:opacity-100" src="{{ wp_get_attachment_image_url($artableLogoId, 'xlarge') }}" alt="">
        </a>
    @endif
</div>
