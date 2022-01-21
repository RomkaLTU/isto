<footer class="py-8">
    <div class="container">
        <div class="mt-6">
            @include('partials.social')
            <div class="text-14px text-center max-w-full">
                {!! nl2br($themeOptions['contacts_contacts']) !!}
            </div>
        </div>
        <div class="w-full flex items-center lg:items-end justify-between mt-4 lg:mt-0">
            <a class="brand no-hover hidden lg:block flex-1 max-w-[135px]" href="{{ home_url('/') }}">
                <img src="@asset('images/logo-footer.svg')" alt="">
            </a>
            <div class="flex-1 text-center text-13px">
                ©ISTO {{ date('Y') }} | <a href="{{ get_privacy_policy_url() }}">{{ __('Privatumo politika', 'isto') }}</a>
            </div>
            <div>
                <a href="#" class="flex-1 max-w-[140px] flex items-center space-x-1 text-13px with-arrow">
                    <span>{{ __('Į VIRŠŲ', 'isto') }}</span>
                    <img src="@asset('images/arrow-right-1.svg')" class="w-5 arrow-right" alt="">
                </a>
            </div>
        </div>
    </div>
</footer>
