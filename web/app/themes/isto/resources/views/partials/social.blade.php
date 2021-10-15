<div class="flex items-center justify-center space-x-4 mb-8">
    @if(!empty($themeOptions['contacts_social_facebook']))
        <a class="no-hover" href="{{ $themeOptions['contacts_social_facebook'] }}"><img src="@asset('images/facebook.svg')" alt=""></a>
    @endif
    @if(!empty($themeOptions['contacts_social_instagram']))
        <a class="no-hover" href="{{ $themeOptions['contacts_social_instagram'] }}"><img src="@asset('images/instagram.svg')" alt=""></a>
    @endif
    @if(!empty($themeOptions['contacts_social_pinterest']))
        <a class="no-hover" href="{{ $themeOptions['contacts_social_pinterest'] }}"><img src="@asset('images/pinterest.svg')" alt=""></a>
    @endif
</div>
