{{--
  Title: Inspiration
  Category: design
  Icon: schedule
  Mode: edit
  Align: left
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

@php
$verticalSpace = get_field('vertical_space') ?? true ? 'my-80px' : '';
$title = get_field('global')['title'];
$imageId = get_field('image');
$group = get_field('group');
$groupImageId = $group['image'];
$groupTitle = $group['title'];
$groupText = $group['text'];
$groupLink = $group['link'];
@endphp

<div class="block-inspiration {{ $verticalSpace }}">
    <div class="container">
        @include('blocks.partials.title')

        <div class="relative bg-white">
            <div class="lg:absolute lg:inset-0">
              <div class="lg:absolute lg:inset-y-0 lg:left-0 lg:w-1/3">
                <img class="h-56 w-full object-cover lg:absolute lg:h-full" src="{{ wp_get_attachment_image_url( $imageId, 'xlarge' ) }}" alt="">
              </div>
            </div>
            <div class="relative pt-12 pb-16 px-4 sm:pt-16 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:grid lg:grid-cols-3">
              <div class="lg:col-start-2 col-span-2">
                <div class="text-14px lg:pl-40px">
                    @if(!empty($groupTitle))
                        <h3 class="text-22px mb-5">{{ $groupTitle }}</h3>
                    @endif
                    @if(!empty($groupText))
                        <div class="mb-5 max-w-[607px]">{{ $groupText }}</div>
                    @endif

                    <a href="{{ $groupLink['url'] }}" class="with-arrow text-14px border border-black px-[55px] py-4 inline-flex items-center space-x-1">
                        <span>{{ __('Daugiau info', 'isto') }}</span>
                        <img src="@asset('images/arrow-right-1.svg')" class="arrow-right" alt="">
                    </a>
                    @if (!empty($groupImageId))
                        <div class="text-center">
                            <img src="{{ wp_get_attachment_image_url( $groupImageId, 'xlarge' ) }}" class="mx-auto max-h-[320px]" alt="">
                        </div>
                    @endif
                </div>
              </div>
            </div>
        </div>

        @include('blocks.partials.more-link', ['title' => __('Daugiau įkvėpimo', 'isto'), 'link' => get_post_type_archive_link('post')])
    </div>
</div>
