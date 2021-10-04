<header class="header mb-8 lg:mb-0" x-data="{showMobileMenu: false}">
  <div class="container py-6">
    <div class="flex items-center justify-between fixed z-40 top-0 left-0 w-full bg-gray-1 lg:bg-transparent px-4 lg:px-0 py-2 lg:py-0 lg:static">
      @include('partials.header-logo')

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
      </div>
    </div>
  </div>

  <div x-cloak="showMobileMenu" x-show="showMobileMenu" class="lg:hidden h-screen fixed left-0 top-0 w-full z-50 bg-gray-1">
    <div class="flex justify-between px-30px pt-10">
      @include('partials.header-logo')
      <button @click="showMobileMenu = false" type="button" class="button">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div class="flex items-center justify-between px-30px py-4 pt-8 border-b border-gray-2">
      <div>
        @include('partials.search-field')
      </div>
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
      </div>
    </div>
    @if (has_nav_menu('primary_navigation'))
      <div class="p-8 py-10 uppercase text-18px">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary-mobile', 'echo' => false]) !!}
      </div>
    @endif
  </div>
</header>
