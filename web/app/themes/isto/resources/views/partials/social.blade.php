<div class="flex items-center justify-center space-x-4 mb-8">
    @if(!empty($themeOptions['contacts_social_facebook']))
        <a target="_blank" rel="noopener noreferrer" class="no-hover hover:scale-120 duration-300" href="{{ $themeOptions['contacts_social_facebook'] }}">
            <img src="@asset('images/facebook.svg')" alt="">
        </a>
    @endif
    @if(!empty($themeOptions['contacts_social_instagram']))
        <a target="_blank" rel="noopener noreferrer" class="no-hover hover:scale-120 duration-300" href="{{ $themeOptions['contacts_social_instagram'] }}">
            <img src="@asset('images/instagram.svg')" alt="">
        </a>
    @endif
    @if(!empty($themeOptions['contacts_social_pinterest']))
        <a target="_blank" rel="noopener noreferrer" class="no-hover hover:scale-120 duration-300" href="{{ $themeOptions['contacts_social_pinterest'] }}">
            <img src="@asset('images/pinterest.svg')" alt="">
        </a>
    @endif
</div>
