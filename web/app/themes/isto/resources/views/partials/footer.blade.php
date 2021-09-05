<footer class="py-8">
    <div class="container">
        <div class="mt-6">
            <div class="flex items-center justify-center space-x-4 mb-8">
                @if(!empty($themeOptions['contacts_social_facebook']))
                    <a href="{{ $themeOptions['contacts_social_facebook'] }}"><img src="@asset('images/facebook.svg')" alt=""></a>
                @endif
                @if(!empty($themeOptions['contacts_social_instagram']))
                    <a href="{{ $themeOptions['contacts_social_instagram'] }}"><img src="@asset('images/instagram.svg')" alt=""></a>
                @endif
                @if(!empty($themeOptions['contacts_social_pinterest']))
                    <a href="{{ $themeOptions['contacts_social_pinterest'] }}"><img src="@asset('images/pinterest.svg')" alt=""></a>
                @endif
            </div>
            <div class="text-14px text-center prose max-w-full">
                {!! nl2br($themeOptions['contacts_contacts']) !!}
            </div>
        </div>
        <div class="w-full flex items-center lg:items-end justify-between mt-4 lg:mt-0">
            <a class="brand hidden lg:block flex-1 max-w-[135px]" href="{{ home_url('/') }}">
                <img src="@asset('images/logo-footer.svg')" alt="">
            </a>
            <div class="flex-1 text-center text-13px">
                ©ISTO {{ date('Y') }} | <a href="{{ get_privacy_policy_url() }}">{{ __('Privatumo politika', 'isto') }}</a>
            </div>
            <div>
                <a href="#" class="flex-1 max-w-[140px] flex items-center space-x-1 text-13px">
                    <span>{{ __('Architektų zona', 'isto') }}</span>
                    <svg viewBox="0 0 24 24" width="24" height="19" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0Z"/><path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4Z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>
