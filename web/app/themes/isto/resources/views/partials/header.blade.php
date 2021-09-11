<header class="header mb-8 lg:mb-0" x-data="{showMobileMenu: false}">
  <div class="container py-6">
    <div class="flex items-center justify-between fixed z-50 top-0 left-0 w-full bg-white lg:bg-transparent px-4 lg:px-0 py-2 lg:py-0 lg:static">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="@asset('images/logo.svg')" alt="">
      </a>

      <div class="hidden lg:block">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary', 'echo' => false]) !!}
        @endif
      </div>
      <div class="lg:hidden mt-[7px]">
        <button x-show="!showMobileMenu" @click="showMobileMenu = true" type="button" class="button lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
        <button x-cloak="showMobileMenu" x-show="showMobileMenu" @click="showMobileMenu = false" type="button" class="button">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <div x-cloak="showMobileMenu" x-show="showMobileMenu" class="absolute left-0 top-0 mt-[54px] px-4 py-8 bg-white w-full border-t">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary-mobile flex flex-col justify-center items-center space-y-2', 'echo' => false]) !!}
          @endif
        </div>
      </div>
    </div>
  </div>
</header>
