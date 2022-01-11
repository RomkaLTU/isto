<div class="absolute hidden pt-5"></div>
<header class="header mb-8 lg:mb-0" x-data="{showMobileMenu: false}">
  <div class="container py-6">
    <div class="flex items-center justify-between fixed z-40 top-0 left-0 w-full bg-gray-1 lg:bg-transparent px-4 lg:px-0 py-2 lg:py-0 lg:static">
      @include('partials.header-logo')

      <div class="hidden lg:flex lg:space-x-5">
        <div>
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary', 'echo' => false]) !!}
          @endif
        </div>
        <div class="flex items-center">
          <a href="{{ \App\getPermalinkByTemplate('favorites') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 32.787 28.861">
              <g id="Like_icon" data-name="Like icon" transform="translate(0.5 0.5)">
                <path x-cloak="!$store.favs.items.length" x-show="!$store.favs.items.length" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" fill="none" stroke="#000" stroke-width="1"/>
                <path x-cloak="$store.favs.items.length" x-show="$store.favs.items.length" fill="#333333" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" stroke="#000" stroke-width="1"/>
              </g>
            </svg>
          </a>
          <?php echo do_shortcode('[weglot_switcher]') ?>
        </div>
      </div>
      <div class="lg:hidden mt-[7px]">
        <button x-show="!showMobileMenu" @click="showMobileMenu = true" type="button" class="button lg:hidden">
          <svg id="mobile_menu_burger" data-name="mobile menu burger" xmlns="http://www.w3.org/2000/svg" width="42" height="41" viewBox="0 0 42 41">
            <rect id="Rectangle_469" data-name="Rectangle 469" width="42" height="41" fill="#f5f5f5" opacity="0"/>
            <rect id="Rectangle_456" data-name="Rectangle 456" width="32.042" height="0.737" transform="translate(4.957 11.848)"/>
            <rect id="Rectangle_457" data-name="Rectangle 457" width="32.042" height="0.737" transform="translate(4.957 20.252)"/>
            <rect id="Rectangle_458" data-name="Rectangle 458" width="32.042" height="0.737" transform="translate(4.957 28.655)"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div x-cloak="showMobileMenu" x-show="showMobileMenu" class="lg:hidden h-screen fixed left-0 top-0 w-full z-50 bg-gray-1">
    <div class="flex justify-between px-30px pt-10">
      @include('partials.header-logo')
      <button @click="showMobileMenu = false" type="button" class="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="26.281" height="26.273" viewBox="0 0 26.281 26.273">
          <g id="Group_594" data-name="Group 594" transform="translate(14332.098 473.641)">
            <path id="Path_268" data-name="Path 268" d="M-14331.74-473.034l23.576,23.1,2,1.958" fill="none" stroke="#000" stroke-width="1"/>
            <path id="Path_269" data-name="Path 269" d="M-14331.74-473.034l23.576,23.1,2,1.958" transform="translate(-13858.706 -14779.457) rotate(-90)" fill="none" stroke="#000" stroke-width="1"/>
          </g>
        </svg>
      </button>
    </div>
    <div class="flex items-center justify-between px-30px py-4 pt-8 border-b border-gray-2">
      <div>
        @include('partials.search-field')
      </div>
      <div class="flex items-center">
        <a href="{{ \App\getPermalinkByTemplate('favorites') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" viewBox="0 0 32.787 28.861">
            <g id="Like_icon" data-name="Like icon" transform="translate(0.5 0.5)">
              <path x-cloak="!$store.favs.items.length" x-show="!$store.favs.items.length" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" fill="none" stroke="#000" stroke-width="1"/>
              <path x-cloak="$store.favs.items.length" x-show="$store.favs.items.length" fill="#333333" id="Path_163" data-name="Path 163" d="M31.787-1.749a9.549,9.549,0,0,0-2.7-6.559,8.271,8.271,0,0,0-6.239-2.82A8.288,8.288,0,0,0,15.894-7.39,8.288,8.288,0,0,0,8.94-11.129,8.271,8.271,0,0,0,2.7-8.309,9.549,9.549,0,0,0,0-1.749v.19a.883.883,0,0,0,.031.19.883.883,0,0,1,.031.19A14.477,14.477,0,0,0,1.055,3.8,16.224,16.224,0,0,0,3.322,7.883a23.028,23.028,0,0,0,3.135,3.264,31.182,31.182,0,0,0,3.259,2.5,26.911,26.911,0,0,0,3.042,1.711q1.583.76,2.142.982t.869.349q.31-.127.869-.317a23.384,23.384,0,0,0,2.173-.982,31.877,31.877,0,0,0,3.1-1.743,33.624,33.624,0,0,0,3.322-2.472A20.291,20.291,0,0,0,28.4,7.915,17.6,17.6,0,0,0,30.7,3.8a14.039,14.039,0,0,0,1.024-4.975.883.883,0,0,1,.031-.19.883.883,0,0,0,.031-.19v-.19Z" transform="translate(0 11.129)" stroke="#000" stroke-width="1"/>
            </g>
          </svg>
        </a>
        @if(shortcode_exists('weglot_switcher'))
          <?php echo do_shortcode('[weglot_switcher]') ?>
        @endif
      </div>
    </div>
    @if (has_nav_menu('primary_navigation'))
      <div class="p-8 py-10 uppercase text-18px">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary-mobile', 'echo' => false]) !!}
      </div>
    @endif
  </div>
</header>
